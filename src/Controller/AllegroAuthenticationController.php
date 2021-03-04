<?php

namespace App\Controller;

use App\Service\NoAuthControllerInterface;
use Klakier\AllegroAPI\Api;
use PhpParser\JsonDecoder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Annotation\Route;

class AllegroAuthenticationController extends AbstractController implements NoAuthControllerInterface
{
    #[Route('/allegro/token', name: 'allegro-authentication')]
    public function userToken(Api $api)
    {
        $api->getUserAuthorizationCode();
    }

    #[Route('/allegro/callback', name: 'allegro-oatuh2-callback')]
    public function userTokenCallback(Api $api, Request $request): Response
    {
        $authorizationCode = $request->get('code');
        $token = $api->getUserToken($authorizationCode);
        $api->setCookie($token, $api::COOKIE_TOKEN_USER);

        return new RedirectResponse($this->generateUrl("main"));
    }

    #[Route('/allegro/cleartoken', name: 'allegro-clear-token')]
    public function clearToken(Api $api, FlashBagInterface $flashBagInterface)
    {
        $api->clearCookie($api::COOKIE_TOKEN_USER);
        $flashBagInterface->add('info', 'Your access token has been cleared');

        return new RedirectResponse($this->generateUrl("main"));
    }
}
