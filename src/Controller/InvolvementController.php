<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use App\Form\FormType;
use App\Entity\InvolvementContact;
use \Datetime;

class InvolvementController extends Controller
{
    /**
     * @Route("/involvement", name="new_involvement")
     */
    public function index(Request $request)
    {
        $contact = new InvolvementContact();
        $form = $this->createForm(InvolvementContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
            return new Response('Saved new contact with email ' . $contact->getEmail());
        }
        throw new \Exception('No email provided');
    }
}
