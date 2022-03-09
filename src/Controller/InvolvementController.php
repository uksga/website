<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use App\Form\FormType;
use App\Entity\InvolvementContact;
use Doctrine\Persistence\ManagerRegistry;
use \Datetime;

class InvolvementController extends AbstractController
{
    /**
     * @Route("/involvement", name="new_involvement")
     */
    public function index(Request $request, ManagerRegistry $doctrine)
    {
        $contact = new InvolvementContact();
        $form = $this->createForm(InvolvementContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
            return new Response('Saved new contact with email ' . $contact->getEmail());
        }
        throw new \Exception('No email provided');
    }
}
