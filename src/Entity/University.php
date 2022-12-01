<?php

namespace App\Entity;

use App\Repository\UniversityRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UniversityRepository::class)]
class University
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotNull]
    #[ORM\Column(length: 255)]
    private ?string $UniversityName = null;


    #[ORM\ManyToOne(inversedBy: 'universities')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull]
    private ?Governorats $ville = null;

    #[ORM\ManyToOne(inversedBy: 'university')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Filiere $filiere = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUniversityName(): ?string
    {
        return $this->UniversityName;
    }

    public function setUniversityName(string $UniversityName): self
    {
        $this->UniversityName = $UniversityName;

        return $this;
    }

    public function getVille(): ?Governorats
    {
        return $this->ville;
    }

    public function setVille(?Governorats $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getFiliere(): ?Filiere
    {
        return $this->filiere;
    }

    public function setFiliere(?Filiere $filiere): self
    {
        $this->filiere = $filiere;

        return $this;
    }



}
