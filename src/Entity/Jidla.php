<?php
namespace App\Entity;

use App\Repository\JidlaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JidlaRepository::class)]
class Jidla
{
    //----Sloupec----
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nazev = null;

    #[ORM\Column]
    private ?int $cena = null;
    //----Sloupec----
    //----Propojení----
    #[ORM\OneToMany(targetEntity: PolozkaMenicka::class, mappedBy: 'jidla', cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $polozkaMenicka;
    //----Propojení----

    public function __construct()
    {
        $this->polozkaMenicka = new ArrayCollection();
    }

    //----Metody----
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCena(): ?int
    {
        return $this->cena;
    }

    public function setCena(int $cena): static
    {
        $this->cena = $cena;

        return $this;
    }

    public function getNazev(): ?string
    {
        return $this->nazev;
    }

    public function setNazev(string $nazev): static
    {
        $this->nazev = $nazev;

        return $this;
    }

    public function getPolozkaMenicka(): array
    {
        return $this->polozkaMenicka->toArray();
    }

    public function setPolozkaMenicka(array $polozkaMenicka): static
    {
        $this->polozkaMenicka = new ArrayCollection($polozkaMenicka);

        return $this;
    }

    public function addPolozkaMenicka(PolozkaMenicka $polozkaMenicka): self
    {
        if (!$this->polozkaMenicka->contains($polozkaMenicka)) {
            $this->polozkaMenicka[] = $polozkaMenicka;
            $polozkaMenicka->setJidla($this);
        }

        return $this;
    }

    public function removePolozkaMenicka(PolozkaMenicka $polozkaMenickaKOdstraneni): self
    {
        if ($this->polozkaMenicka->contains($polozkaMenickaKOdstraneni)) {
            $this->polozkaMenicka->removeElement($polozkaMenickaKOdstraneni);
        }

        return $this;
    }
    //----Metody----
}
