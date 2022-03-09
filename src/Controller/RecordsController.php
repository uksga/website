<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\MeetingRecord;
use App\Entity\ManagingEntity;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @Route("/records")
 */
class RecordsController extends AbstractController
{
    /**
     * @Route("/", name="records")
     */
    public function index(ManagerRegistry $doctrine)
    {
        $oe = $doctrine->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Operations and Evaluations Committee'
        ));
        $asa = $doctrine->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Academic and Student Affairs Committee'
        ));
        $ar = $doctrine->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Apropriations and Revenue Committee'
        ));
        $fs = $doctrine->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Full Senate'
        ));
        $sc = $doctrine->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Supreme Court'
        ));
        if (!is_null($oe) && !is_null($asa) && !is_null($ar))
        {
            $records = [$oe->getMostRecentMeetingRecords(2), $asa->getMostRecentMeetingRecords(2), $ar->getMostRecentMeetingRecords(2)];
            return $this->render('records/index.html.twig', array(
                'active_link' => 'records',
                'managingEntities' => array(
                    $oe, $asa, $ar, $fs, $sc
                )
            ));
        }
        return $this->render('records/index.html.twig', array(
            'active_link' => 'records'
        ));
    }
}
