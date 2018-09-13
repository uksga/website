<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\TeamMember;
use App\Entity\Team;
use App\Entity\InvolvementContact;
use App\Service\UserStoryLogger;

use App\Form\InvolvementContactType;

use \Datetime;

/**
 * @Route("/branches")
 */
class BranchesController extends Controller
{
    /**
     * @Route("/", name="branches")
     */
    public function index(Request $request, UserStoryLogger $logger)
    {
        $logger->log($request->get('_route'));
        $teams = $this->getDoctrine()->getManager()->getRepository(Team::class)->findAll();

        return $this->render('branches/index.html.twig', [
            'teams' => $teams,
            'active_link' => 'branches'
        ]);
    }

    /**
     * @Route("/{teamName}", name="branch_page")
     */
    public function showBranch(Request $request, $teamName)
    {
        $branchRepo = $this->getDoctrine()->getManager()->getRepository(Team::class);
        $branch = $branchRepo->findBy(array(
            'name' => $teamName
        ));
        if ($branch)
        {
            return $this->render('branches/branch.html.twig', array(
                'team' => $branch[0],
                'active_link' => 'branches'
            ));
        }
        throw new \Exception('No branch exists');
    }
}
