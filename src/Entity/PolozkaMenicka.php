<?php

namespace App\Entity;

use App\Repository\PolozkaMenickaRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Menicka;
use App\Entity\Jidla;

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
    //----Metody----
}
