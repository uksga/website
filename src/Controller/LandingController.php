<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Doctrine\Persistence\ManagerRegistry;

use \Datetime;

use App\Form\InvolvementContactType;

use App\Entity\InvolvementContact;

use App\Service\UserStoryLogger;

class LandingController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, UserStoryLogger $logger, ManagerRegistry $doctrine)
    {
        $logger->log($request->get('_route'));

        $contact = new InvolvementContact();
        $form = $this->createForm(InvolvementContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->persistForm($form, $request, $doctrine);
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

    private function persistForm($form, $request, ManagerRegistry $doctrine)
    {
        $this->addFlash("info", "We've received your email and look forward to talking with you!");
        $contact = $form->getData();
        $date = new DateTime();
        $contact->setCreatedAt($date);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($contact);
        $entityManager->flush();
    }
}
