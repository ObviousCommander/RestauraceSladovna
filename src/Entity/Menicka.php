<?php
namespace App\Entity;

use App\Repository\MenickaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenickaRepository::class)]
class Menicka
{
    //----Sloupec----
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datum = null;

    
    //----Sloupec----
    //----Propojení----
    #[ORM\OneToMany(targetEntity: PolozkaMenicka::class, mappedBy: 'menicka', cascade: ['persist', 'remove'], orphanRemoval: true)]
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

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): static
    {
        $this->datum = $datum;

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
        $this->polozkaMenicka->add($polozkaMenicka);

        return $this;
    }

    public function removePolozkaMenicka(PolozkaMenicka $polozkaMenicka): self
    {
        $this->polozkaMenicka->removeElement($polozkaMenicka);

        return $this;
    }
    //----Metody----
}
