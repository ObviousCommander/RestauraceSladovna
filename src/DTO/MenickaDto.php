<?php

namespace App\DTO;

use App\Controller\Translations;
use Symfony\Component\Validator\Constraints as Assert;

class MenickaDto{
    #[Assert\NotBlank(message: Translations::MESSAGE)]
    public \DateTimeInterface $datum;

    #[Assert\NotBlank(message: Translations::MESSAGE)]
    public array $polozkaMenicka;
}