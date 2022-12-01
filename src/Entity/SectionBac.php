<?php

namespace App\Entity;

use App\Repository\SectionBacRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionBacRepository::class)]
class SectionBac
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $SectionBacName = null;

    #[ORM\ManyToMany(targetEntity: University::class, mappedBy: 'specialites')]
    private Collection $universities;

    public function __construct()
    {
        $this->universities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSectionBacName(): ?string
    {
        return $this->SectionBacName;
    }

    public function setSectionBacName(string $SectionBacName): self
    {
        $this->SectionBacName = $SectionBacName;

        return $this;
    }

    /**
     * @return Collection<int, University>
     */
    public function getUniversities(): Collection
    {
        return $this->universities;
    }

    public function addUniversity(University $university): self
    {
        if (!$this->universities->contains($university)) {
            $this->universities->add($university);
            $university->addSpecialite($this);
        }

        return $this;
    }

    public function removeUniversity(University $university): self
    {
        if ($this->universities->removeElement($university)) {
            $university->removeSpecialite($this);
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->SectionBacName;
    }
}
