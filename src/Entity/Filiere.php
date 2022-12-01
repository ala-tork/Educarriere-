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

    #[ORM\OneToMany(mappedBy: 'filiere', targetEntity: University::class)]
    private Collection $university;

    public function __construct()
    {
        $this->university = new ArrayCollection();
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
     * @return Collection<int, University>
     */
    public function getUniversity(): Collection
    {
        return $this->university;
    }

    public function addUniversity(University $university): self
    {
        if (!$this->university->contains($university)) {
            $this->university->add($university);
            $university->setFiliere($this);
        }

        return $this;
    }

    public function removeUniversity(University $university): self
    {
        if ($this->university->removeElement($university)) {
            // set the owning side to null (unless already changed)
            if ($university->getFiliere() === $this) {
                $university->setFiliere(null);
            }
        }

        return $this;
    }


}
