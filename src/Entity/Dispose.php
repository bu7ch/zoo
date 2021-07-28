<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DisposeRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=DisposeRepository::class)
 * @UniqueEntity(fields={"personne","animaux"})
 */
class Dispose
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Animal::class)
     */
    private $animaux;

    /**
     * @ORM\ManyToOne(targetEntity=Personne::class, inversedBy="disposes")
     */
    private $personne;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimaux(): ?Animal
    {
        return $this->animaux;
    }

    public function setAnimaux(?Animal $animaux): self
    {
        $this->animaux = $animaux;

        return $this;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): self
    {
        $this->personne = $personne;

        return $this;
    }

    public function getNbre(): ?int
    {
        return $this->nbre;
    }

    public function setNbre(int $nbre): self
    {
        $this->nbre = $nbre;

        return $this;
    }
}
