<?php

namespace App\Entity;

use App\Repository\FiliereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FiliereRepository::class)]
class Filiere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $FiliereName = null;

    #[ORM\OneToMany(mappedBy: 'Filiere', targetEntity: ScoreUniversity::class)]
    private Collection $scoreUniversities;

    public function __construct()
    {
        $this->scoreUniversities = new ArrayCollection();
    }







    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFiliereName(): ?string
    {
        return $this->FiliereName;
    }

    public function setFiliereName(string $FiliereName): self
    {
        $this->FiliereName = $FiliereName;

        return $this;
    }


    public function __toString(): string
    {
        return $this->FiliereName;
    }

    /**
     * @return Collection<int, ScoreUniversity>
     */
    public function getScoreUniversities(): Collection
    {
        return $this->scoreUniversities;
    }

    public function addScoreUniversity(ScoreUniversity $scoreUniversity): self
    {
        if (!$this->scoreUniversities->contains($scoreUniversity)) {
            $this->scoreUniversities->add($scoreUniversity);
            $scoreUniversity->setFiliere($this);
        }

        return $this;
    }

    public function removeScoreUniversity(ScoreUniversity $scoreUniversity): self
    {
        if ($this->scoreUniversities->removeElement($scoreUniversity)) {
            // set the owning side to null (unless already changed)
            if ($scoreUniversity->getFiliere() === $this) {
                $scoreUniversity->setFiliere(null);
            }
        }

        return $this;
    }




}
