<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
class Score
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $MG = null;

    #[ORM\Column(length: 255)]
    private ?string $sectionBac = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMG(): ?float
    {
        return $this->MG;
    }

    public function setMG(float $MG): self
    {
        $this->MG = $MG;

        return $this;
    }

    public function getSectionBac(): ?string
    {
        return $this->sectionBac;
    }

    public function setSectionBac(string $sectionBac): self
    {
        $this->sectionBac = $sectionBac;

        return $this;
    }
}
