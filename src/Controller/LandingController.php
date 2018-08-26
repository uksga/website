<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use \Datetime;

use App\Form\InvolvementContactType;

use App\Entity\InvolvementContact;

use App\Service\UserStoryLogger;

class LandingController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, UserStoryLogger $logger)
    {
        $logger->log($request->get('_route'));

        $contact = new InvolvementContact();
        $form = $this->createForm(InvolvementContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->persistForm($form, $request);
            return $this->render('landing/index.html.twig', [
                'active_link' => 'about_us',
                'form' => $form->createView()
            ]);
        }
        return $this->render('landing/index.html.twig', [
            'form' => $form->createView(),
            'active_link' => 'about_us'
        ]);
    }

    private function persistForm($form, $request)
    {
        $this->addFlash("info", "We've received your email and look forward to talking with you!");
        $contact = $form->getData();
        $date = new DateTime();
        $contact->setCreatedAt($date);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($contact);
        $entityManager->flush();
    }
}
