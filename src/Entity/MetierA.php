<?php

namespace App\Entity;

use App\Repository\MetierARepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MetierARepository::class)]
class MetierA
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $salaire = null;

    #[ORM\Column(length: 255)]
    private ?string $chomage = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Description $description = null;

   
    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSalaire(): ?string
    {
        return $this->salaire;
    }

    public function setSalaire(string $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getChomage(): ?string
    {
        return $this->chomage;
    }

    public function setChomage(string $chomage): self
    {
        $this->chomage = $chomage;

        return $this;
    }

    public function getDescription(): ?Description
    {
        return $this->description;
    }

    public function setDescription(?Description $description): self
    {
        $this->description = $description;

        return $this;
    }

 


   
}
