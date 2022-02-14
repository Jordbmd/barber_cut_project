<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CustomerHomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $categories = $categoryRepository->findAll();

        $products = $productRepository->findAll();


        return $this->render('customer/home_customer.html.twig', [
            'controller_name' => 'CustomerHomeController',
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
