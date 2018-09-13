<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/legislation")
 */
class LegislationController extends AbstractController
{
    /**
     * @Route("/", name="legislation")
     */
    public function index()
    {
        return $this->render('legislation/index.html.twig', array(
            'active_link' => 'legislation'
        ));
    }
}
