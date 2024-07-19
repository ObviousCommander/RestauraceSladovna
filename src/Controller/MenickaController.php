<?php
// src/Controller/MenickaController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MenickaRepository;
use App\Repository\JidlaRepository;
use App\Repository\PolozkaMenickaRepository;

class MenickaController extends AbstractController
{
    private MenickaRepository $menickaRepository;
    private JidlaRepository $jidlaRepository;
    private PolozkaMenickaRepository $polozkyRepository;

    public function __construct(MenickaRepository $menickaRepository, JidlaRepository $jidlaRepository, PolozkaMenickaRepository $polozkyRepository)
    {
        $this->menickaRepository = $menickaRepository;
        $this->jidlaRepository = $jidlaRepository;
        $this->polozkyRepository = $polozkyRepository;
    }

    #[Route('/menicka', name: 'app_menicka')]
    public function index(): Response
    {
        $aktualniMenicka = $this->menickaRepository->vratAktualniJidelnicky();

        return $this->render('menicka/index.html.twig', [
            'controller_name' => 'MenickaController',
            'data' => $aktualniMenicka,
        ]);
    }
}
