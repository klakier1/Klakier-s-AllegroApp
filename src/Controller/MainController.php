<?php

namespace App\Controller;

use App\Service\NoAuthControllerInterface;
use Klakier\AllegroAPI\AllegroAppCredentials;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Klakier\AllegroAPI\Api;
use Klakier\AllegroAPI\Calls\DeliveryCalls;
use Klakier\AllegroAPI\Model\Delivery\DeliveryMethod;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController implements NoAuthControllerInterface
{
    #[Route('/', name: 'main')]
    public function index(): Response
    {
        return $this->render("home/home.html.twig");
    }

    #[Route('/phpinfo', name: 'phpinfo')]
    public function _phpinfo()
    {
        //phpinfo();
        die;
    }

    #[Route('/xdebug', name: 'xdebug')]
    public function _xdebug_info()
    {
        //xdebug_info();
        die;
    }

    #[Route('/custom/{val?}', name: 'custom')]
    public function custom(Request $request, AllegroAppCredentials $credentials, Api $api): Response
    {

        $dc = new DeliveryCalls($api);


        dump($dc->fetchShippingRatesWithDeliveyMethods());
        die;


        $dm = $dc->fetchDeliveryMethods();
        //dump($dm);

        $srs = $dc->fetchShippingRates();
        dump($srs);

        foreach ($srs->getShippingRates() as $key => $value) {
            $sr = $dc->fetchShippingRate($value->getId());
            dump($sr);

            //delivery methods array with one element
            $d = array_filter(
                $dm->getDeliveryMethods(),
                function (DeliveryMethod $method) use ($sr) {
                    if (0 == strcmp($method->getId(), $sr->getRates()[0]->getDeliveryMethod()->getId()))
                        return true;
                    return false;
                }
            );
            dump($d);
        }

        $test = "5d9c7838-e05f-4dec-afdd-58e884170ba7";
        dump($dc->fetchDeliveryMethod($test));
        $test = "7203cb90-864c-4cda-bf08-dc883f0c78ad";
        dump($dc->fetchDeliveryMethod($test));

        die;

        return $this->render("custom/custom.html.twig", [
            //"path" => $request->get("val"),
            "path" => $credentials->client_id,
            "envs" => $_ENV
        ]);
    }

    /**
     * test2
     *
     * @Route("/blog/{val?}", name= "blog")
     * @param Request $request
     * 
     * @return Response
     */
    public function test2(Request $request): Response
    {
        dump($request);
        return new Response("<h2>=> " . $request->get("val", "NOPE!") . " <=</h2>");
    }

    /**
     * test
     *
     * @return Response
     */
    public function test(): Response
    {
        return $this->json([
            'message' => 'Testowy route z YAML',
            'path' => 'src/Controller/MainController.php',
        ]);
    }
}
