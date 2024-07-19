<?php

namespace App\Entity;

use App\Repository\StolyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StolyRepository::class)]
class Stoly
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
