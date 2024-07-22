<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MenickaRepository;
use App\Repository\JidlaRepository;
use App\Repository\PolozkaMenickaRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Menicka;
use App\Form\MenickaType;

class MenickaController extends AbstractController
{
    private MenickaRepository $menickaRepository;
    private JidlaRepository $jidlaRepository;
    private PolozkaMenickaRepository $polozkyRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(
        MenickaRepository $menickaRepository,
        JidlaRepository $jidlaRepository,
        PolozkaMenickaRepository $polozkyRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->menickaRepository = $menickaRepository;
        $this->jidlaRepository = $jidlaRepository;
        $this->polozkyRepository = $polozkyRepository;
        $this->entityManager = $entityManager;
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

    #[Route('/menicka/new', name: 'menicka_new')]
    public function new(Request $request): Response
    {
        $menicka = new Menicka();
        $form = $this->createForm(MenickaType::class, $menicka);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Uložení nového menu
            $this->entityManager->persist($menicka);
            $this->entityManager->flush();

            return $this->redirectToRoute('/');
        }

        return $this->render('menicka/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
