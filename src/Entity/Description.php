<?php

namespace App\Entity;

use App\Repository\DescriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DescriptionRepository::class)]
class Description
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 255)]
    private ?string $contenu = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?MetierA $metierA = null;

   

    public function getId(): ?int
    {
        return $this->id;
    }

  

   

  
    

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getMetierA(): ?MetierA
    {
        return $this->metierA;
    }

    public function setMetierA(?MetierA $metierA): self
    {
        $this->metierA = $metierA;

        return $this;
    }
}
