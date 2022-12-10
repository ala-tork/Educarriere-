<?php

namespace App\Entity;

use App\Repository\ScoreUniversityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreUniversityRepository::class)]
class ScoreUniversity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $score = null;

    #[ORM\ManyToOne(inversedBy: 'scoreUniversities')]
    private ?University $university = null;

    #[ORM\ManyToOne(inversedBy: 'scoreUniversities')]
    private ?Filiere $Filiere = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(float $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getUniversity(): ?University
    {
        return $this->university;
    }

    public function setUniversity(?University $university): self
    {
        $this->university = $university;

        return $this;
    }

    public function getFiliere(): ?Filiere
    {
        return $this->Filiere;
    }

    public function setFiliere(?Filiere $Filiere): self
    {
        $this->Filiere = $Filiere;

        return $this;
    }
}
