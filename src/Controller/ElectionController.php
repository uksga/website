<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/election")
 */
class ElectionController extends AbstractController
{
    /**
     * @Route("/", name="election")
     */
    public function index()
    {
        return $this->render('election/index.html.twig', array(
            'active_link' => 'election'
        ));
    }
}