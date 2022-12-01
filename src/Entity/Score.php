<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
class Score
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    #[ORM\OneToMany(mappedBy: 'SectionBac', targetEntity: SectionBac::class)]
    private Collection $sectionBac;

    public function __construct()
    {
        $this->sectionBac = new ArrayCollection();
    }

    /**
     * @return Collection<int, SectionBac>
     */
    public function getSectionBac(): Collection
    {
        return $this->sectionBac;
    }

    #[ORM\Column]
    private ?float $MG = null;

    public function getMG(): ?int
    {
        return $this->MG;
    }

}
