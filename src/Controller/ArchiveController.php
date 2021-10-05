<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Entity\MeetingRecord;
use App\Entity\ManagingEntity;

/**
 * @Route("/archive")
 */
class ArchiveController extends Controller
{
    /**
     * @Route("/", name="archive")
     */
    public function index()
    {
        $oe = $this->getDoctrine()->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Operations and Evaluations Committee'
        ));
        $asa = $this->getDoctrine()->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Academic and Student Affairs Committee'
        ));
        $ar = $this->getDoctrine()->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Appropriations and Revenue Committee'
        ));
        $fs = $this->getDoctrine()->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Full Senate'
        ));
        $sc = $this->getDoctrine()->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Supreme Court'
        ));
        if (!is_null($oe) && !is_null($asa) && !is_null($ar))
        {
            $records = [$oe->getMostRecentMeetingRecords(2), $asa->getMostRecentMeetingRecords(2), $ar->getMostRecentMeetingRecords(2)];
            return $this->render('archive/index.html.twig', array(
                'active_link' => 'archive',
                'managingEntities' => array(
                    $oe, $asa, $ar, $fs, $sc
                )
            ));
        }
        return $this->render('archive/index.html.twig', array(
            'active_link' => 'archive'
        ));
    }
}