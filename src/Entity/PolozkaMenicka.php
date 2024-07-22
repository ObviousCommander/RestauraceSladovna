<?php

namespace App\Entity;

use App\Repository\PolozkaMenickaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Menicka;
use App\Entity\Jidla;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: PolozkaMenickaRepository::class)]
class PolozkaMenicka
{
    //----Sloupec----
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    //----Sloupec----
    //----Propojení----
    #[ORM\ManyToOne(targetEntity:Menicka::class)]
    #[ORM\JoinColumn(name: 'menicka_id', referencedColumnName: 'id', nullable: true, onDelete: 'SET NULL')]
    private Menicka $menicka;

    #[ORM\ManyToOne(targetEntity:Jidla::class)]
    #[ORM\JoinColumn(name: 'jidla_id', referencedColumnName: 'id', nullable: true, onDelete: 'SET NULL')]
    private Jidla $jidla;

    #[ORM\ManyToMany(targetEntity: Rezervace::class, mappedBy: 'polozkaMenicka', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $rezervace;
    public function __construct()
    {
        $this->rezervace = new ArrayCollection();
    }
    //----Propojení----
    
    //----Metody----
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getMenicka(): Menicka
    {
        return $this->menicka;
    }

    public function setMenicka(Menicka $menicka): self
    {
        $this->menicka = $menicka;

        return $this;
    }
    public function getJidla(): Jidla
    {
        return $this->jidla;
    }

    public function setJidla(Jidla $jidlo): self
    {
        $this->jidlo = $jidlo;

        return $this;
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
