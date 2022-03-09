<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/information")
 */
class InformationController extends AbstractController
{
    /**
     * @Route("/senator_bio/{token}", name="information")
     */
    public function index(Request $request, $token)
    {
        if ($token == 1)
        {
            return new Response("awesome!");
        }
        throw new \Exception("get outta here!");
    }
}
