<?php

namespace App\Facade;

use App\DTO\JidlaDto;
use App\Entity\Jidla;
use App\Repository\JidlaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class JidlaFacade{
    private EntityManagerInterface $entityManager;
    private JidlaRepository $jidlaRepository;
    private KernelInterface $kernel;

    public function __construct(
        EntityManagerInterface $entityManager,
        JidlaRepository $jidlaRepository,
        KernelInterface $kernel
    )
    {
        $this->entityManager = $entityManager;
        $this->jidlaRepository = $jidlaRepository;
        $this->kernel = $kernel;
    }

    public function create(JidlaDto $dto, ?int $id): void
    {
        if ($id === null) {
            $jidla = new Jidla();
        } else {
            $jidla = $this->jidlaRepository->find($id);
            if (!$jidla) {
                throw new \Exception('Jídlo nenalezeno');
            }
        }

        $jidla->setNazev($dto->nazev);
        $jidla->setCena($dto->cena);
        $this->entityManager->persist($jidla);
        $this->entityManager->flush();
    }

    public function remove($id): void
    {
        $jidla = $this->jidlaRepository->findOneBy(['id'=> $id]);
        if($jidla){
            $this->entityManager->remove($jidla);
            $this->entityManager->flush();
        }
    }
}