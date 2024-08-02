<?php

namespace App\Controller;

use App\DTO\JidlaDto;
use App\Facade\JidlaFacade;
use App\Form\JidlaType;
use App\Repository\JidlaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class JidlaController extends AbstractController
{
    private JidlaRepository $jidlaRepository;
    private JidlaFacade $facade;

    public function __construct(
        JidlaRepository $jidlaRepository,
        JidlaFacade $facade
    ) {
        $this->jidlaRepository = $jidlaRepository;
        $this->facade = $facade;
    }
    #[Route('/jidla', name: 'app_jidla')]
    public function index(): Response
    {
        $jidla = $this->jidlaRepository->findAll();
        return $this->render('jidla/index.html.twig', [
            'controller_name' => 'JidlaController',
            'data'=> $jidla
        ]);
    }

    #[Route('/jidla/new/{id}', name: 'jidla_new', defaults: ['id' => null])]
    public function new(Request $request, ?int $id): Response
    {
        $jidlaDto = new JidlaDto();

        if ($id !== null) {
            $jidla = $this->jidlaRepository->find($id);
            if (!$jidla) {
                throw $this->createNotFoundException('Jídlo nenalezeno');
            }

            // Naplnění DTO daty z existující entity
            $jidlaDto->nazev = $jidla->getNazev();
            $jidlaDto->cena = $jidla->getCena();
        }

        $form = $this->createForm(JidlaType::class, $jidlaDto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $jidlaDto = $form->getData();
            $this->facade->create($jidlaDto, $id);
            return $this->redirectToRoute('app_jidla');
        }

        return $this->render('jidla/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/jidla/remove/{id}', name: 'jidla_remove')]
    public function remove(Request $request, int $id): Response
    {
        $this->facade->remove($id);
        $this->addFlash("success", "Jidlo odebráno");
        return $this->redirectToRoute('app_jidla');
    }

}
