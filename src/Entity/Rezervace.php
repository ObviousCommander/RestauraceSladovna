<?php

namespace App\Entity;

use App\Repository\RezervaceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: RezervaceRepository::class)]
class Rezervace
{
    //----Sloupec----
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $jmeno = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datum = null;

    #[ORM\Column(length: 100)]
    private ?string $mail = null;

    #[ORM\Column]
    private ?int $tel = null;

    #[ORM\Column]
    private ?int $pocetLidi = null;
    
    //----Sloupec----
    //----Propojení----

    #[ORM\ManyToMany(targetEntity: PolozkaMenicka::class, inversedBy: 'rezervace', cascade: ['persist', 'remove'], orphanRemoval: true)]
    #[ORM\JoinTable(name: 'Rezervace_PolozkaMenicka')]
    private Collection $polozkaMenicka;

    #[ORM\ManyToMany(targetEntity: Stoly::class, inversedBy: 'rezervace', cascade: ['persist', 'remove'], orphanRemoval: true)]
    #[ORM\JoinTable(name: 'Rezervace_Stoly')]
    private Collection $stoly;

    public function __construct()
    {
        $this->polozkaMenicka = new ArrayCollection();
        $this->stoly = new ArrayCollection();
    }
    //----Propojení----
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJmeno(): ?string
    {
        return $this->jmeno;
    }

    public function setJmeno(string $jmeno): static
    {
        $this->jmeno = $jmeno;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): static
    {
        $this->datum = $datum;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getPocetLidi(): ?int
    {
        return $this->pocetLidi;
    }

    public function setPocetLidi(int $pocetLidi): static
    {
        $this->pocetLidi = $pocetLidi;

        return $this;
    }

    public function getPolozkaMenicka(): array
    {
        return $this->polozkaMenicka->toArray();
    }

    public function addPolozkaMenicka(PolozkaMenicka $polozkaMenicka): self
    {
        $this->polozkaMenicka->add($polozkaMenicka);

        return $this;
    }

    public function setPolozkaMenicka(array $polozkaMenicka): self
    {
        $this->polozkaMenicka = new ArrayCollection($polozkaMenicka);

        return $this;
    }
    public function removePolozkaMenicka(PolozkaMenicka $polozkaMenicka): self
    {
        $this->polozkaMenicka->removeElement($polozkaMenicka);

        return $this;
    }
    public function getStoly(): array
    {
        return $this->stoly->toArray();
    }

    public function addStoly(Stoly $stoly): self
    {
        $this->stoly->add($stoly);

        return $this;
    }

    public function setStoly(array $stoly): self
    {
        $this->stoly = new ArrayCollection($stoly);

        return $this;
    }
    public function removeStoly(Stoly $stoly): self
    {
        $this->stoly->removeElement($stoly);

        return $this;
    }
}
