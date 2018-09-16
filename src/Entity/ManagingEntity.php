<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ManagingEntityRepository")
 */
class ManagingEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MeetingRecord", mappedBy="managing_entity")
     */
    private $meeting_records;

    public function __construct()
    {
        $this->meeting_records = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|MeetingRecord[]
     */
    public function getMeetingRecords(): Collection
    {
        return $this->meeting_records;
    }

    public function addMeetingRecord(MeetingRecord $meetingRecord): self
    {
        if (!$this->meeting_records->contains($meetingRecord)) {
            $this->meeting_records[] = $meetingRecord;
            $meetingRecord->setManagingEntity($this);
        }

        return $this;
    }

    public function removeMeetingRecord(MeetingRecord $meetingRecord): self
    {
        if ($this->meeting_records->contains($meetingRecord)) {
            $this->meeting_records->removeElement($meetingRecord);
            // set the owning side to null (unless already changed)
            if ($meetingRecord->getManagingEntity() === $this) {
                $meetingRecord->setManagingEntity(null);
            }
        }

        return $this;
    }

    /**
    * @return MeetingRecord[] Returns an array of MeetingRecord objects
    */
    public function getMostRecentMeetingRecords($count)
    {
        return array_slice($this->meeting_records->toArray(), 0, $count);
    }
}
