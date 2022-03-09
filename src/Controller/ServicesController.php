<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

use App\Entity\Service;
use App\Form\ServiceType;
use Doctrine\Persistence\ManagerRegistry;

use App\Entity\TeamMember;

/**
     * @Route("/services")
     */
class ServicesController extends AbstractController
{
    /**
     * @Route("/", name="services")
     */
    public function index(Request $request, ManagerRegistry $doctrine)
    {
        $services = $doctrine->getManager()->getRepository(Service::class)->findAll();
        return $this->render('services/index.html.twig', [
            'services' => $services,
            'active_link' => 'services'
        ]);
    }
}
