<?php

namespace App\Controller;

use App\Facade\StolyFacade;
use App\Repository\StolyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class StolyController extends AbstractController
{
    private StolyRepository $stolyRepository;
    private StolyFacade $facade;

    public function __construct(
        StolyRepository $stolyRepository,
        StolyFacade $facade
    ) {
        $this->stolyRepository = $stolyRepository;
        $this->facade = $facade;
    }
    #[Route('/stoly', name: 'app_stoly')]
    public function index(): Response
    {
        $stoly = $this->stolyRepository->findAll();
        return $this->render('stoly/index.html.twig', [
            'controller_name' => 'StolyController',
            'data' => $stoly
        ]);
    }

    #[Route('/stoly/new', name: 'stoly_new')]
    public function new(Request $request, ?int $id): Response
    {
        $this->facade->create();
        return $this->redirectToRoute('app_stoly');
    }

    #[Route('/stoly/remove/{id}', name: 'stoly_remove')]
    public function remove(Request $request, int $id): Response
    {
        $this->facade->remove($id);
        $this->addFlash("success", "Jidlo odebráno");
        return $this->redirectToRoute('app_stoly');
    }
}
