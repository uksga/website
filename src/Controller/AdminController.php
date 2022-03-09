<?php

namespace App\Controller;

use App\Service\S3;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

use App\Entity\TeamMember;
use App\Entity\Team;
use App\Entity\User;
use App\Entity\Service;
use App\Entity\ManagingEntity;
use App\Entity\MeetingRecord;

use App\Form\ServiceType;
use App\Form\FormType;
use App\Form\TeamMemberType;
use App\Form\UserType;
use App\Form\TeamType;
use App\Form\MeetingRecordType;

use Doctrine\Persistence\ManagerRegistry;

use \Datetime;

/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="manage_teams")
     */
    public function manageTeams(Request $request, ManagerRegistry $doctrine)
    {
        $emTeam = $doctrine->getManager()->getRepository(Team::class);
        $executive = $emTeam->findOneBy(['name' => 'executive']);
        $judicial = $emTeam->findOneBy(['name' => 'judicial']);
        $legislative = $emTeam->findOneBy(['name' => 'legislative']);
        $teamsEmpty = (is_null($executive) && is_null($judicial) && is_null($legislative));
        return $this->render('admin/teams.html.twig', [
            'active_link' => 'manage_team',
            'teams_empty' => $teamsEmpty,
            'teams' => array(
                'executive' => $executive,
                'judicial' => $judicial,
                'legislative' => $legislative)
        ]);
    }

    /**
     * @Route("/add_team", name="add_team")
     */
    public function addTeam(Request $request, ManagerRegistry $doctrine)
    {
        $team = new Team();
        $form = $this->createForm(TeamType::class, $team);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $team = $form->getData();
            $teamName = $team->getName();
            $team->setName(strtolower($teamName));
            $entityManager = $doctrine->getManager();
            $entityManager->persist($team);
            $entityManager->flush();
            return $this->redirectToRoute('manage_teams');
        }
        return $this->render('admin/edit_team.html.twig', array(
            'form' => $form->createView(),
            'active_link' => 'manage_team',
            'team' => $team,
            'referer' => $request->headers->get('referer')
        ));
    }


    /**
     * @Route("/edit_team", name="edit_team")
     */
    public function editTeam(Request $request, ManagerRegistry $doctrine)
    {
        $id = $request->get('id');
        if ($id)
        {
            $team = $doctrine->getManager()->getRepository(Team::class)->find($id);
            if ($team)
            {
                $form = $this->createForm(TeamType::class, $team);
                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                    $doctrine->getManager()->flush();
                    return $this->redirectToRoute('manage_teams');
                }
                return $this->render('admin/edit_team.html.twig', array(
                    'form' => $form->createView(),
                    'active_link' => 'manage_team',
                    'team' => $team,
                    'referer' => $request->headers->get('referer')
                ));
            }
        }
    }



    /**
     * @Route("/add_member", name="add_member")
     */
    public function addTeamMember(Request $request, ManagerRegistry $doctrine)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $teamMember = new TeamMember();
        $form = $this->createForm(TeamMemberType::class, $teamMember);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $teamMember = $form->getData();
            $teamMember->setCreatedAt(new DateTime());
            $teamMember->setActive(TRUE);

            // Get and upload profile image data
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $form->get('profile_image')->getData();
            $contents = file_get_contents($file->getPathname());
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            $s3 = $this->container->get(S3::class);
            $s3->PutS3File($contents, $fileName, $mimeType = 'image/jpeg');
            $teamMember->setProfileImageUrl($fileName);

            $entityManager = $doctrine->getManager();
            $entityManager->persist($teamMember);
            $entityManager->flush();
            return $this->redirectToRoute('manage_teams');
        }

        return $this->render('admin/add_team_member.html.twig', array(
            'form' => $form->createView(),
            'active_link' => 'manage_team',
            'referer' => $request->headers->get('referer')
        ));
    }

    /**
     * @Route("/edit", name="edit_member")
     */
    public function editMember(Request $request, ManagerRegistry $doctrine)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $id = $request->get('id');
        $ref = $request->headers->get('referer');
        if ($id)
        {
            $em = $doctrine->getManager();
            $repo = $em->getRepository(TeamMember::class);
            $member = $repo->find($id);
            if ($member)
            {
                $form = $this->createForm(TeamMemberType::class, $member);
                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                    // Get and upload profile image data
                    /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
                    $file = $form->get('profile_image')->getData();
                    $contents = file_get_contents($file->getPathname());
                    $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

                    $s3 = $this->container->get(S3::class);
                    $s3->PutS3File($contents, $fileName, $mimeType = 'image/jpeg');
                    $member->setProfileImageUrl($fileName);
                    $em->flush();
                    return $this->redirectToRoute('manage_teams');
                }
                return $this->render('admin/edit_team_member.html.twig', array(
                    'form' => $form->createView(),
                    'active_link' => 'manage_team',
                    'member' => $member,
                    'referer' => $ref
                ));

            }
            throw new \Exception('No member exists for ID ' . $id);
        }
        throw new \Exception('No id present in request.');
    }

    /**
     * @Route("/deactivate", name="deactivate")
     */
    public function deactivate(Request $request, ManagerRegistry $doctrine)
    {
        $id = $request->get('id');
        $teamName = $request->get('team');
        if ($id)
        {
            $em = $doctrine->getManager();
            $repo = $em->getRepository(TeamMember::class);
            $member = $repo->find($id);
            if ($member)
            {
                $member->setActive(FALSE);
                $em->persist($member);
                $em->flush();
                return $this->redirectToRoute('manage_teams');
            }
        }
        throw new \Exception('No such ID exists.');
    }

    /**
     * @Route("/current_users", name="current_users")
     */
    public function currentUsers(Request $request, ManagerRegistry $doctrine)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $users = $doctrine->getManager()->getRepository(User::class)->findAll();
        return $this->render('/admin/users.html.twig', array(
            'active_link' => 'control',
            'users' => $users
        ));
    }

    /**
     * @Route("/add_user", name="add_user")
     */
    public function addUser(Request $request, UserPasswordHasherInterface $encoder, ManagerRegistry $doctrine)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $user = new PasswordAuthenticatedUserInterface();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $encoder->hashPassword($user, $user->getPassword());
            $user->getPassword($password);
            $roles = ['ROLE_USER'];
            $submittedRole = $form['roles']->getData();
            if ($submittedRole)
            {
                $roles = ['ROLE_ADMIN'];
            }
            $user->getRoles($roles);
            $entityManager = $doctrine->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('current_users');
        }
        return $this->render('/admin/add_user.html.twig', array(
            'form' => $form->createView(),
            'referer' => $request->headers->get('referer'),
            'active_link' => 'control'
        ));
    }

    /**
     * @Route("/delete_user", name="delete_user")
     */
    public function deleteUser(Request $request, ManagerRegistry $doctrine)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $id = $request->get('id');
        if ($id)
        {
            $em = $doctrine->getManager();
            $user = $em->getRepository(User::class)->find($id);
            if ($user)
            {
                $em->remove($user);
                $em->flush();
                return $this->redirectToRoute('current_users');
            }
            throw new \Exception('No such user exists.');
        }
        throw new \Exception('No such ID exists.');
    }

    /**
     * @Route("/add_service", name="add_service")
     */
    public function addService(Request $request, ManagerRegistry $doctrine)
    {
        $teamMembers = $doctrine->getManager()->getRepository(TeamMember::class)->findAll();
        $service = new Service();
        $form = $this->createForm(ServiceType::class, $service, array(
            'team_members' => $teamMembers
        ));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $service = $form->getData();
            $service->setCreatedAt(new DateTime());

            // Get and upload profile image data
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $form->get('profile_image')->getData();
            $contents = file_get_contents($file->getPathname());
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            $s3 = $this->container->get(S3::class);
            $s3->PutS3File($contents, $fileName, $mimeType = 'image/jpeg');
            $service->setImageUrl($fileName);

            // Accept new lines (add breaks)
            $text = nl2br($service->getDescription());
            $service->setDescription($text);

            $entityManager = $doctrine->getManager();
            $entityManager->persist($service);
            $entityManager->flush();
            return $this->redirectToRoute('current_services');
        }

        return $this->render('/admin/add_service.html.twig', array(
            'form' => $form->createView(),
            'referer' => $request->headers->get('referer')
        ));
    }

      /**
     * @Route("/delete_service/{id}", name="delete_service")
     */
    public function deleteService(Request $request, $id, ManagerRegistry $doctrine)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        $id = $request->get('id');
        if ($id)
        {
            $em = $doctrine->getManager();
            $service = $em->getRepository(Service::class)->find($id);
            if ($service)
            {
                $em->remove($service);
                $em->flush();
                return $this->redirectToRoute('current_services');
            }
            throw new \Exception('No such service exists.');
        }
        throw new \Exception('No such ID exists.');
    }

    /**
     * @Route("/current_services", name="current_services")
     */
    public function currentServices(Request $request, ManagerRegistry $doctrine)
    {
        $services = $doctrine->getManager()->getRepository(Service::class)->findAll();
        return $this->render('/admin/services.html.twig', array(
            'services' => $services,
            'active_link' => 'services'
        ));
    }

    /**
     * @Route("/records", name="current_records")
     */
    public function currentRecords(Request $request, ManagerRegistry $doctrine)
    {
        // Fetch all managing entities and their records
        $oe = $doctrine->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Operations and Evaluations Committee'
        ));
        $asa = $doctrine->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Academic and Student Affairs Committee'
        ));
        $ar = $doctrine->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Apropriations and Revenue Committee'
        ));
        $fullSenate = $doctrine->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Full Senate'
        )); 
        $sc = $doctrine->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Supreme Court'
        ));
        return $this->render('/admin/records.html.twig', array(
            'active_link' => 'records',
            'oe' => $oe,
            'asa' => $asa,
            'ar' => $ar,
            'fullSenate' => $fullSenate,
            'sc' => $sc
        ));
    }

    /**
     * @Route("/delete_record/{id}", name="delete_record")
     */
    public function deleteRecord(Request $request, $id, ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $repo = $em->getRepository(MeetingRecord::class);
        $record = $repo->find($id);
        if ($record)
        {
            $em->remove($record);
            $em->flush();
            return $this->redirectToRoute('current_records');
        }
        return $this->redirectToRoute('current_records');
    }

    /**
     * @Route("/add_record", name="add_record")
     */
    public function addRecord(Request $request, ManagerRegistry $doctrine)
    {
        // $managingEntityId = $request->get('id');
        $repo = $doctrine->getManager()->getRepository(ManagingEntity::class);
        // $managingEntity = $repo->find($managingEntityId);

        $managingEntities = $repo->findAll();
        $record = new MeetingRecord();
        $form = $this->createForm(MeetingRecordType::class, $record, array(
            'managing_entities' => $managingEntities
        ));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $meetingRecord = $form->getData();
            //$meetingRecord->setApprovedDate(new DateTime());

            // Get and upload profile image data
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $form->get('document')->getData();
            $contents = file_get_contents($file->getPathname());

            $entityName = preg_replace("/[\s-]+/", " ", $meetingRecord->getManagingEntity()->getName());
            $entityName = preg_replace("/[\s_]/", "-", $entityName);
            $date = $meetingRecord->getApprovedDate()->format('Y-m-d');
            $fileName = $date . '-' . $entityName . '.pdf';

            $s3 = $this->container->get(S3::class);
            $s3->PutS3File($contents, $fileName, $mimeType = 'application/pdf');
            $meetingRecord->setDocumentURL($fileName);

            $entityManager = $doctrine->getManager();
            $entityManager->persist($meetingRecord);
            $entityManager->flush();
            return $this->redirectToRoute('current_records');
        }

        return $this->render('/admin/add_record.html.twig', array(
            'form' => $form->createView(),
            'referer' => $request->headers->get('referer'),
            'active_link' => 'records'
        )); 
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

    private function fetchTeamMembers($teamName, ManagerRegistry $doctrine)
    {
        $emTeam = $doctrine->getManager()->getRepository(Team::class);
        $team = $emTeam->findOneBy(['name' => $teamName]);

        if ($team)
        {
            $teamMembers = $team->getTeamMembers();
            if ($teamMembers)
            {
                return $teamMembers;
            }
            throw new \Exception("No members.");
        }
        throw new \Exception("No such team name.");
    }

}
