<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'product-show')]
    public function productShow(): Response
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'products' => $products
        ]);
    }

    #[Route('/product/create', name: 'product-create')]
    public function create(Request $request): Response
    {
        $product = new Product();

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            $this->addFlash(
                "success",
                "Product inserted: " . $product->getName() . " for " . number_format($product->getPrice(), 2) . " PLN"
            );

            unset($product);
            unset($form);
            $product = new Product();
            $form = $this->createForm(ProductType::class, $product);
        }

        return $this->render('product/create.html.twig', [
            'controller_name' => 'ProductController',
            'formProduct' => $form->createView()
        ]);
    }

    #[Route('/product/createrandom', name: 'product-create-random')]
    public function addtest(LoggerInterface $logger): Response
    {
        $test_products = ["PlayStation4", "TV Samsung", "Apple iBook", "Brother printer", "Wireless charger"];

        $em = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName($test_products[rand(0, count($test_products) - 1)]);
        $product->setPrice(rand(1000, 200) + rand(0, 100) / 100);
        $product->setCategory("76543");
        $product->setStock(rand(1, 20));

        $logger->info("Added " . $product->getName() . ", price: " . $product->getPrice());

        $em->persist($product);
        $em->flush();

        $this->addFlash(
            "success",
            "Random product inserted: " . $product->getName() . " for " . number_format($product->getPrice(), 2) . " PLN"
        );

        return new RedirectResponse($this->generateUrl('product-show'));
    }

    #[Route('/product/delete/{id}', name: 'product-delete-single', methods: ['GET'])]
    public function productDelete($id, LoggerInterface $logger): Response
    {
        if (!intval($id)) {
            $this->addFlash("success", "Wrong ID");
            return new RedirectResponse($this->generateUrl('product-show'));
        }

        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);

        if ($product) {
            $em = $this->getDoctrine()->getManager();

            $em->remove($product);
            $em->flush();

            $logger->info("Removed " . $product->getName() . ", price: " . $product->getPrice());

            $this->addFlash("success", "Product was removed");
        }
        return new RedirectResponse($this->generateUrl('product-show'));
    }

    #[Route('/product/{id}', name: 'product-show-single', methods: ['GET'])]
    public function productShowSingle(Product $product): Response
    {
        if (!$product) {
            $this->addFlash("success", "Wrong ID");
            return new RedirectResponse($this->generateUrl('product-show'));
        }

        return $this->render('product/show-single.html.twig', [
            'controller_name' => 'ProductController',
            'product' => $product
        ]);
    }
}
