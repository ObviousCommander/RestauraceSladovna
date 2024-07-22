<?php

namespace App\Entity;

use App\Repository\AdminiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminiRepository::class)]
class Admini
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $jmeno = null;

    #[ORM\Column(length: 255)]
    private ?string $heslo = null;

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

    public function getHeslo(): ?string
    {
        return $this->heslo;
    }

    public function setHeslo(string $heslo): static
    {
        $this->heslo = $heslo;

        return $this;
    }
}
