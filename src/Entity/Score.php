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

    #[ORm\Column]
    private ?float $Moyenne_Francais;

    #[ORm\Column]
    private ?float $Moyenne_anglais;

    #[ORM\Column(nullable: true)]
    private ?float $moyenne_algo = null;

    #[ORM\Column(nullable: true)]
    private ?float $moyenne_math = null;

    #[ORM\Column(nullable: true)]
    private ?float $moyenne_BD = null;

    #[ORM\Column(nullable: true)]
    private ?float $moyenne_physique = null;

    #[ORM\Column(nullable: true)]
    private ?float $moyenne_tic = null;

    #[ORM\Column(nullable: true)]
    private ?float $moyenne_science = null;

    #[ORM\Column(nullable: true)]
    private ?float $moyenne_gestion = null;

    #[ORM\Column(nullable: true)]
    private ?float $moyenne_eco = null;

    #[ORM\Column(nullable: true)]
    private ?float $moyenne_histoirGeo = null;

    #[ORM\Column(nullable: true)]
    private ?float $moyenne_technique = null;

    #[ORM\Column(nullable: true)]
    private ?float $moyenne_phylo = null;

    #[ORM\Column(nullable: true)]
    private ?float $moyenne_arab = null;

    /**
     * @return float|null
     */
    public function getMoyenneFrancais(): ?float
    {
        return $this->Moyenne_Francais;
    }

    /**
     * @param float|null $Moyenne_Francais
     */
    public function setMoyenneFrancais(?float $Moyenne_Francais): void
    {
        $this->Moyenne_Francais = $Moyenne_Francais;
    }

    /**
     * @return float|null
     */
    public function getMoyenneAnglais(): ?float
    {
        return $this->Moyenne_anglais;
    }

    /**
     * @param float|null $Moyenne_anglais
     */
    public function setMoyenneAnglais(?float $Moyenne_anglais): void
    {
        $this->Moyenne_anglais = $Moyenne_anglais;
    }

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

    public function getMoyenneAlgo(): ?float
    {
        return $this->moyenne_algo;
    }

    public function setMoyenneAlgo(?float $moyenne_algo): self
    {
        $this->moyenne_algo = $moyenne_algo;

        return $this;
    }

    public function getMoyenneMath(): ?float
    {
        return $this->moyenne_math;
    }

    public function setMoyenneMath(?float $moyenne_math): self
    {
        $this->moyenne_math = $moyenne_math;

        return $this;
    }

    public function getMoyenneBD(): ?float
    {
        return $this->moyenne_BD;
    }

    public function setMoyenneBD(?float $moyenne_BD): self
    {
        $this->moyenne_BD = $moyenne_BD;

        return $this;
    }

    public function getMoyennePhysique(): ?float
    {
        return $this->moyenne_physique;
    }

    public function setMoyennePhysique(?float $moyenne_physique): self
    {
        $this->moyenne_physique = $moyenne_physique;

        return $this;
    }

    public function getMoyenneTic(): ?float
    {
        return $this->moyenne_tic;
    }

    public function setMoyenneTic(?float $moyenne_tic): self
    {
        $this->moyenne_tic = $moyenne_tic;

        return $this;
    }

    public function getMoyenneScience(): ?float
    {
        return $this->moyenne_science;
    }

    public function setMoyenneScience(?float $moyenne_science): self
    {
        $this->moyenne_science = $moyenne_science;

        return $this;
    }

    public function getMoyenneGestion(): ?float
    {
        return $this->moyenne_gestion;
    }

    public function setMoyenneGestion(?float $moyenne_gestion): self
    {
        $this->moyenne_gestion = $moyenne_gestion;

        return $this;
    }

    public function getMoyenneEco(): ?float
    {
        return $this->moyenne_eco;
    }

    public function setMoyenneEco(?float $moyenne_eco): self
    {
        $this->moyenne_eco = $moyenne_eco;

        return $this;
    }

    public function getMoyenneHistoirGeo(): ?float
    {
        return $this->moyenne_histoirGeo;
    }

    public function setMoyenneHistoirGeo(?float $moyenne_histoirGeo): self
    {
        $this->moyenne_histoirGeo = $moyenne_histoirGeo;

        return $this;
    }

    public function getMoyenneTechnique(): ?float
    {
        return $this->moyenne_technique;
    }

    public function setMoyenneTechnique(?float $moyenne_technique): self
    {
        $this->moyenne_technique = $moyenne_technique;

        return $this;
    }

    public function getMoyennePhylo(): ?float
    {
        return $this->moyenne_phylo;
    }

    public function setMoyennePhylo(?float $moyenne_phylo): self
    {
        $this->moyenne_phylo = $moyenne_phylo;

        return $this;
    }

    public function getMoyenneArab(): ?float
    {
        return $this->moyenne_arab;
    }

    public function setMoyenneArab(?float $moyenne_arab): self
    {
        $this->moyenne_arab = $moyenne_arab;

        return $this;
    }
}
