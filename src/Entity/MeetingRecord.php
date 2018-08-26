<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MeetingRecordRepository")
 */
class MeetingRecord
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $approved_date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ManagingEntity", inversedBy="meeting_records")
     * @ORM\JoinColumn(nullable=false)
     */
    private $managing_entity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $document_url;

    public function getId()
    {
        return $this->id;
    }

    public function getApprovedDate(): ?\DateTimeInterface
    {
        return $this->approved_date;
    }

    public function setApprovedDate(\DateTimeInterface $approved_date): self
    {
        $this->approved_date = $approved_date;

        return $this;
    }

    public function getManagingEntity(): ?ManagingEntity
    {
        return $this->managing_entity;
    }

    public function setManagingEntity(?ManagingEntity $managing_entity): self
    {
        $this->managing_entity = $managing_entity;

        return $this;
    }

    public function getDocumentUrl(): ?string
    {
        return $this->document_url;
    }

    public function setDocumentUrl(?string $document_url): self
    {
        $this->document_url = $document_url;

        return $this;
    }
}
