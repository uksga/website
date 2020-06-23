<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/archive")
 */
class ArchiveController extends AbstractController
{
    /**
     * @Route("/", name="archive")
     */
    public function index()
    {
        return $this->render('archive/index.html.twig', array(
            'active_link' => 'archive'
        ));
    }
}
