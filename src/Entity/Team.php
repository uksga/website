<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 */
class Team
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
     * @ORM\OneToMany(targetEntity="App\Entity\TeamMember", mappedBy="team")
     */
    private $team_members;

    /**
     * @ORM\Column(type="string", length=280)
     */
    private $short_description;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $long_description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hero_url;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hero_image;

    public function __construct()
    {
        $this->team_members = new ArrayCollection();
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
     * @return Collection|TeamMember[]
     */
    public function getTeamMembers(): Collection
    {
        return $this->team_members;
    }

    public function addTeamMember(TeamMember $teamMember): self
    {
        if (!$this->team_members->contains($teamMember)) {
            $this->team_members[] = $teamMember;
            $teamMember->setTeam($this);
        }

        return $this;
    }

    public function removeTeamMember(TeamMember $teamMember): self
    {
        if ($this->team_members->contains($teamMember)) {
            $this->team_members->removeElement($teamMember);
            // set the owning side to null (unless already changed)
            if ($teamMember->getTeam() === $this) {
                $teamMember->setTeam(null);
            }
        }

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }

    public function setShortDescription(string $short_description): self
    {
        $this->short_description = $short_description;

        return $this;
    }

    public function getLongDescription(): ?string
    {
        return $this->long_description;
    }

    public function setLongDescription(string $long_description): self
    {
        $this->long_description = $long_description;

        return $this;
    }

    public function getHeroUrl(): ?string
    {
        return $this->hero_url;
    }

    public function setHeroUrl(?string $hero_url): self
    {
        $this->hero_url = $hero_url;

        return $this;
    }

    public function getHeroImage(): ?string
    {
        return $this->hero_image;
    }

    public function setHeroImage(?string $hero_image): self
    {
        $this->hero_image = $hero_image;

        return $this;
    }
}
