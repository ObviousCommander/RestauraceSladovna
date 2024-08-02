<?php

namespace App\DTO;

use App\Controller\Translations;
use App\Entity\Jidla;
use App\Entity\Menicka;
use Symfony\Component\Validator\Constraints as Assert;

class PolozkaMenickaDto
{
    #[Assert\NotBlank(message: Translations::MESSAGE)]
    public Jidla $jidla;
    #[Assert\NotBlank(message: Translations::MESSAGE)]
    public Menicka $menicka;
}