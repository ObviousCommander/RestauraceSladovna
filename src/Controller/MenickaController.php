<?php

namespace App\Controller;

use App\DTO\MenickaDto;
use App\Facade\MenickaFacade;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MenickaRepository;
use App\Form\MenickaType;

class MenickaController extends AbstractController
{
    private MenickaRepository $menickaRepository;
    private MenickaFacade $facade;

    public function __construct(
        MenickaRepository $menickaRepository,
        MenickaFacade $facade
    ) {
        $this->menickaRepository = $menickaRepository;
        $this->facade = $facade;
    }

    #[Route('/menicka', name: 'app_menicka')]
    public function index(): Response
    {
        $aktualniMenicka = $this->menickaRepository->vratAktualniJidelnicky();

        return $this->render('menicka/index.html.twig', [
            'controller_name' => 'MenickaController',
            'data' => $aktualniMenicka,
            'admin' => true
        ]);
    }

    #[Route('/menicka/new/{id}', name: 'menicka_new', defaults: ['id' => null])]
    public function new(Request $request, ?int $id): Response
    {
        $menickaDto = new MenickaDto();

        if ($id != null){
            $menicka = $this->menickaRepository->find($id);

            if (!$menicka) 
                throw $this->createNotFoundException('Menicko nenalezeno');
            
        }
        $form = $this->createForm(MenickaType::class, $menickaDto);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $menickaDto = $form->getData();
            $this->facade->create($menickaDto, null);
            return $this->redirectToRoute('app_menicka');
        }

        return $this->render('menicka/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/menicka/remove/{id}', name: 'menicka_remove')]
    public function remove(Request $request, int $id): Response
    {
        $this->facade->remove($id);
        $this->addFlash("success", "Menicko odebráno");
        return $this->redirectToRoute('app_menicka');
    }
    #[Route('/menicka/removePolozka/{id}', name: 'menicka_polozka_remove')]
    public function removePolozkaMenicka(Request $request, int $id): Response
    {
        $this->facade->removePolozka($id);
        $this->addFlash("success", "Položka odebrána");
        return $this->redirectToRoute('app_menicka');
    }

}