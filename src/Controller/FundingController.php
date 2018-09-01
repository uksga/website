<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/funding")
 */
class FundingController extends AbstractController
{
    /**
     * @Route("/", name="funding")
     */
    public function index()
    {
        return $this->render('funding/index.html.twig', array(
            'active_link' => 'funding'
        ));
    }
}
