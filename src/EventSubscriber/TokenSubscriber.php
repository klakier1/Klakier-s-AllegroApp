<?php

namespace App\EventSubscriber;

use App\Controller\MainController;
use App\Service\NoAuthControllerInterface;
use Exception;
use Klakier\AllegroAPI\Api;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Throwable;

class TokenSubscriber implements EventSubscriberInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var Api
     */
    private $api;

    /**
     * @var \Twig\Environment
     */
    private $twig;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var FlashBagInterface 
     */
    private $flashBagInterface;


    public function __construct(LoggerInterface $logger, Api $api, \Twig\Environment $twig, UrlGeneratorInterface $urlGenerator, FlashBagInterface $flashBagInterface)
    {
        $this->logger = $logger;
        $this->api = $api;
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
        $this->flashBagInterface = $flashBagInterface;
    }

    public function onKernelController(ControllerEvent $event)
    {
        /**
         * @var string
         */
        $baseUrl = $event->getRequest()->getBaseUrl();

        $this->logger->info(" ! KLAKSON ! EVENT controler $baseUrl");

        try {
            $controller = $event->getController();

            // when a controller class defines multiple action methods, the controller
            // is returned as [$controllerInstance, 'methodName']
            if (is_array($controller)) {
                $controller = $controller[0];
            }

            $token = $event->getRequest()->cookies->get(Api::COOKIE_TOKEN_USER);
            if ($token) {
                $me = $this->api->callGetMethod($token, '/me');
                if ($me) {
                    $this->twig->addGlobal('allegroProfile', $me);
                    return;
                }
            }
        } catch (Throwable $e) {
            $this->flashBagInterface->add('info', $e->getMessage());
            $this->api->clearCookie($this->api::COOKIE_TOKEN_USER);
            $url = $this->urlGenerator->generate('main');
            $event->setController(fn () => new RedirectResponse($url));
        }

        if (!$controller instanceof NoAuthControllerInterface) {
            $url = $this->urlGenerator->generate('main');
            $event->setController(fn () => new RedirectResponse($url));
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.controller' => 'onKernelController',
        ];
    }
}
