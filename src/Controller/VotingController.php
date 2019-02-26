<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/voting")
 */
class VotingController extends AbstractController
{
    /**
     * @Route("/", name="voting")
     */
    public function index()
    {
        return $this->render('voting/index.html.twig', array(
            'active_link' => 'voting'
        ));
    }
}
