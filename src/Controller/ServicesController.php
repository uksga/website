<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

use App\Entity\Service;
use App\Form\ServiceType;

use App\Entity\TeamMember;

/**
     * @Route("/services")
     */
class ServicesController extends Controller
{
    /**
     * @Route("/", name="services_home")
     */
    public function index(Request $request)
    {
        $services = $this->getDoctrine()->getManager()->getRepository(Service::class)->findAll();
        return $this->render('services/index.html.twig', [
            'services' => $services,
            'active_link' => 'services'
        ]);
    }
}
