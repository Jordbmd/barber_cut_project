<?php

namespace App\Controller\Admin;

use App\Entity\CommandShop;
use App\Repository\CommandShopRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminCommandShopController extends AbstractController
{
    /**
     * @Route("/admin/command/shop", name="admin_command_shop")
     */
    public function index(CommandShopRepository $commandShopRepository): Response
    {
        return $this->render('admin/admin_command_shop.html.twig', [
            'command_shops' => $commandShopRepository->findAll(),
        ]);
    }


    /**
     * @Route("/admin/command/{id}", name="admin_command_show", methods={"GET"})
     */
    public function show(CommandShop $commandShop): Response
    {
        return $this->render('admin/admin_command_show.html.twig', [
            'command_shop' => $commandShop,
        ]);
    }
}
