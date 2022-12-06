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

    #[ORM\ManyToMany(targetEntity: University::class, mappedBy: 'Filiere')]
    private Collection $universities;

    public function __construct()
    {
        $this->universities = new ArrayCollection();
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
    public function getUniversities(): Collection
    {
        return $this->universities;
    }

    public function addUniversity(University $university): self
    {
        if (!$this->universities->contains($university)) {
            $this->universities->add($university);
            $university->addFiliere($this);
        }

        return $this;
    }

    public function removeUniversity(University $university): self
    {
        if ($this->universities->removeElement($university)) {
            $university->removeFiliere($this);
        }

        return $this;
    }




}
