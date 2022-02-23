<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\BookingType;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Stmt\Echo_;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookingController extends AbstractController
{
    /**
     * @Route("/booking", name="booking")
     */
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(BookingType::class);
        $form->handleRequest($request);
        $data = $form->getData();


        if ($form->isSubmitted() && $form->isValid()) {

            $parameters = $request->request->all();
            $booking = new Booking;


            $day = $parameters['booking']['date']['date']['day'];
            $month = $parameters['booking']['date']['date']['month'];
            $year = $parameters['booking']['date']['date']['year'];

            $hour = $parameters['booking']['date']['time']['hour'];
            $minute = $parameters['booking']['date']['time']['minute'];

            
            $phone_number = $parameters['booking']['phone_number'];
            $lastname = $parameters['booking']['lastname'];
            $firstname = $parameters['booking']['firstname'];


            $date = new DateTime("$day-$month-$year $hour:$minute");


            $lastname = $data->setLastname($lastname);
            $firstname = $data->setFirstname($firstname);
            $phone_number = $data->setPhoneNumber($phone_number);
            $date = $data->setDate($date);


            $em->persist($lastname, $firstname, $phone_number, $date );
            $em->flush();


            $this->addFlash('success', 'Vouz avez rendez-vous le  ' . $date);
 
            return $this->redirectToRoute('home');
 
        }
 

        return $this->render('customer/booking.html.twig', [
            'form' => $form->createView()
        ]);
    }
}


