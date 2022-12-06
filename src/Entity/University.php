<?php

namespace App\Entity;

use App\Repository\UniversityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToMany(targetEntity: Filiere::class, inversedBy: 'universities')]
    private Collection $Filiere;

    public function __construct()
    {
        $this->Filiere = new ArrayCollection();
    }




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

    /**
     * @return Collection<int, Filiere>
     */
    public function getFiliere(): Collection
    {
        return $this->Filiere;
    }

    public function addFiliere(Filiere $filiere): self
    {
        if (!$this->Filiere->contains($filiere)) {
            $this->Filiere->add($filiere);
        }

        return $this;
    }

    public function removeFiliere(Filiere $filiere): self
    {
        $this->Filiere->removeElement($filiere);

        return $this;
    }




}
