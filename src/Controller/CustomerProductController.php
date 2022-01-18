<?php

namespace App\Controller;

use App\Search\SearchProduct;
use App\Form\SearchProductType;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CustomerProductController extends AbstractController
{
    /**
     * @Route("customer/product", name="customer_product_show")
     */
    public function index(ProductRepository $productRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $search = new SearchProduct();

        $form = $this->createForm(SearchProductType::class, $search);

        $form->handleRequest($request);

        $products = $paginator->paginate(
            $productRepository->findAllBySearchFilter($search), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('customer/product.html.twig', [
            'products' => $products,
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("customer/product/{id}", name="customer_product_id_show")
     */
    public function showid(int $id, ProductRepository $productRepository)
    {
        $product = $productRepository->find($id);

        if (!$product) {
            $this->addFlash("danger", "Le produit est introuvable.");
            return $this->redirectToRoute("home");
        }

        return $this->render("customer/product_show.html.twig", [
            'product' => $product
        ]);
    }

    /**
     * @Route("customer/category/{id}", name="customer_category_show")
     */
    public function productsByCategory(int $id, CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->find($id);

        if (!$category) {
            return $this->redirectToRoute("customer_home");
        }

        return $this->render("customer/category_show.html.twig", [
            'category' => $category
        ]);
    }
}
