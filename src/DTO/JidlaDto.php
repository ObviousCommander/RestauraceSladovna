<?php

namespace App\DTO;

use App\Controller\Translations;
use Symfony\Component\Validator\Constraints as Assert;

class JidlaDto
{
    #[Assert\NotBlank(message: Translations::MESSAGE)]
    #[Assert\Length(min: 5, max: 50, exactMessage: Translations::EXACT_MESSAGE, minMessage: Translations::MIN_MESSAGE, maxMessage: Translations::MAX_MESSAGE, charsetMessage: Translations::CHARSET_MESSAGE)]
    public string $nazev;

    #[Assert\NotBlank(message: Translations::MESSAGE)]
    public string $cena;
    
}