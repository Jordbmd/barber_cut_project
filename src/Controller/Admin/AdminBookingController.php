<?php

namespace App\Controller\Admin;

use App\Repository\BookingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminBookingController extends AbstractController
{
    /**
     * @Route("/admin/booking", name="admin_booking")
     */
    public function index(BookingRepository $bookingRepository): Response
    {
        return $this->render('admin/admin_booking.html.twig', [
            'controller_name' => 'AdminBookingController',
            'booking' => $bookingRepository->findAll(),
        ]);
    }
}
