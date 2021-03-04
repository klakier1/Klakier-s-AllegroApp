<?php

namespace App\Controller;

use Klakier\AllegroAPI\Api;
use Klakier\AllegroAPI\Calls\DeliveryCalls;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AllegroShippingController extends AbstractController
{
    #[Route('/allegro/deliverymethods', name: 'allegro-delivery-methods-show')]
    public function index(Api $api, Request $request): Response
    {
        $calls = new DeliveryCalls($api);
        $shippingRates = $calls->fetchShippingRates();

        return $this->render('allegro_shipping/index.html.twig', [
            'controller_name' => 'AllegroShippingController',
            'shippingRates' => $shippingRates->getShippingRates()
        ]);
    }

    #[Route('/allegro/deliverymethods/{id}', name: 'allegro-delivery-methods-show-single')]
    public function edit($id, Api $api, Request $request): Response
    {
        $calls = new DeliveryCalls($api);
        $shippingRate = $calls->fetchShippingRateWithDeliveyMethods($id);

        return $this->render('allegro_shipping/show-single.html.twig', [
            'controller_name' => 'AllegroShippingController',
            'shippingRate' => $shippingRate
        ]);
    }
}
