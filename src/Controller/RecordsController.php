<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Entity\MeetingRecord;
use App\Entity\ManagingEntity;

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
        $oe = $this->getDoctrine()->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Operations and Evaluations Committee'
        ));
        $asa = $this->getDoctrine()->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Academic and Student Affairs Committee'
        ));
        $ar = $this->getDoctrine()->getManager()->getRepository(ManagingEntity::class)->findOneBy(array(
            'name' => 'Apropriations and Revenue Committee'
        ));
        if (!is_null($oe) && !is_null($asa) && !is_null($ar))
        {
            $records = [$oe->getMostRecentMeetingRecords(2), $asa->getMostRecentMeetingRecords(2), $ar->getMostRecentMeetingRecords(2)];
            return $this->render('records/index.html.twig', array(
                'active_link' => 'records',
                'recordGroups' => $records
            ));
        }
        return $this->render('records/index.html.twig', array(
            'active_link' => 'records'
        ));
    }
}
