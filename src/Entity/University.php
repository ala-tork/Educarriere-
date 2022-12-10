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

    #[ORM\OneToMany(mappedBy: 'university', targetEntity: ScoreUniversity::class)]
    private Collection $scoreUniversities;

    public function __construct()
    {
        $this->scoreUniversities = new ArrayCollection();
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
            $scoreUniversity->setUniversity($this);
        }

        return $this;
    }

    public function removeScoreUniversity(ScoreUniversity $scoreUniversity): self
    {
        if ($this->scoreUniversities->removeElement($scoreUniversity)) {
            // set the owning side to null (unless already changed)
            if ($scoreUniversity->getUniversity() === $this) {
                $scoreUniversity->setUniversity(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->UniversityName;
    }


}
