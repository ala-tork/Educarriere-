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
    public function __toString(): string
    {
        return $this->SectionBacName;
    }
}
