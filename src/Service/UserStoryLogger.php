<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RequestStack;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\UserStory;
use App\Entity\TrackablePage;
use \Datetime;

class UserStoryLogger
{

    protected $sessionInterface;
    protected $requestStack;
    private $em;

    public function __construct(SessionInterface $sessionInterface, RequestStack $requestStack, $em)
    {
        $this->sessionInterface = $sessionInterface;
        $this->entityManager = $em;
        $this->requestStack = $requestStack;
    }
    
    public function log($pageName)
    {
        $page = $this->em->getRepository(TrackablePage::class)->findBy(['name' => $pageName]);
        if ($page)
        {
            $request = $this->requestStack->getCurrentRequest();
            $userStory = new UserStory();
            $userStory->setIp($request->getClientIp());
            $userStory->setPage($pageName);
            $userStory->setCreatedAt(new DateTime());
            
            $this->em->persist($userStory);
            $this->em->flush();
        }
    }
}