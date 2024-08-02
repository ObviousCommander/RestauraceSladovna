<?php

namespace App\Facade;

use App\DTO\StolyDto;
use App\Entity\Stoly;
use App\Repository\StolyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class StolyFacade{
    private EntityManagerInterface $entityManager;
    private StolyRepository $stolyRepository;
    private KernelInterface $kernel;

    public function __construct(
        EntityManagerInterface $entityManager,
        StolyRepository $stolyRepository,
        KernelInterface $kernel
    )
    {
        $this->entityManager = $entityManager;
        $this->stolyRepository = $stolyRepository;
        $this->kernel = $kernel;
    }

    public function create(): void
    {
        $stoly = new Stoly();
        $this->entityManager->persist($stoly);
        $this->entityManager->flush();
    }

    public function remove($id): void
    {
        $stoly = $this->stolyRepository->findOneBy(['id'=> $id]);
        if($stoly){
            $this->entityManager->remove($stoly);
            $this->entityManager->flush();
        }
    }
}