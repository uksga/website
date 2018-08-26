<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RecordsController extends Controller
{
    /**
     * @Route("/records", name="records")
     */
    public function index()
    {
        return $this->render('records/index.html.twig', [
            'controller_name' => 'RecordsController',
        ]);
    }
}
