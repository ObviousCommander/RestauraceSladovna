<?php

namespace App\Entity;

use App\Repository\StolyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: StolyRepository::class)]
class Stoly
{
    //----Sloupec----
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    //----Sloupec----
    //----Propojení----
    #[ORM\ManyToMany(targetEntity: Rezervace::class, mappedBy: 'stoly', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $rezervace;
    //----Propojení----
    //----Metody----
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRezervace(): array
    {
        return $this->rezervace->toArray();
    }

    public function addRezervace(Rezervace $rezervace): self
    {
        $this->rezervace->add($rezervace);

        return $this;
    }

    public function setRezervace(array $rezervace): self
    {
        $this->rezervace = new ArrayCollection($rezervace);

        return $this;
    }
    public function removeRezervace(PolozkaMenicka $rezervace): self
    {
        $this->rezervace->removeElement($rezervace);

        return $this;
    }
    //----Metody----
}
