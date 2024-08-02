<?php

namespace App\Controller;

class Translations
{

    //Tohle je špatně dá se nastavit translation soubory a validace se pak automaticky překladají.
    const MAX_MESSAGE = 'Tato hodnota je příliš dlouhá. Měla by mít {{ limit }} znak nebo méně.|Tato hodnota je příliš dlouhá. Měla by mít {{ limit }} znaky nebo méně.';
    const MIN_MESSAGE = 'Tato hodnota je příliš krátká. Měla by mít {{ limit }} znaků nebo více.|Tato hodnota je příliš krátká. Měla by mít {{ limit }} znaků nebo více.';
    const EXACT_MESSAGE = 'Tato hodnota by měla mít přesně {{ limit }} znak.|Tato hodnota by měla mít přesně {{ limit }} znaků.';
    const CHARSET_MESSAGE = 'Tato hodnota neodpovídá očekávanému znakovému souboru {{ charset }}.';
    const MESSAGE = "Tato hodnota nesmí být prázdná.";
    const EMAIL_MESSAGE = 'Nevalidní E-Mail.';
}