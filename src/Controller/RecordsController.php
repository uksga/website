<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/records")
 */
class RecordsController extends Controller
{
    /**
     * @Route("/", name="records")
     */
    public function index()
    {
        return $this->render('records/index.html.twig', array(
            'active_link' => 'records'
        ));
    }
}
