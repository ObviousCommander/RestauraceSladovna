<?php

namespace App\Facade;

use App\DTO\MenickaDto;
use App\DTO\PolozkaMenickaDto;
use App\Entity\Menicka;
use App\Repository\MenickaRepository;
use App\Repository\PolozkaMenickaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class MenickaFacade
{
    private EntityManagerInterface $entityManager;
    private MenickaRepository $menickaRepository;
    private PolozkaMenickaRepository $polozkaMenickaRepository;

    private KernelInterface $kernel;

    public function __construct(
        EntityManagerInterface $entityManager,
        MenickaRepository $menickaRepository,
        PolozkaMenickaRepository $polozkaMenickaRepository,
        KernelInterface $kernel
    ) 
    {
        $this->entityManager = $entityManager;
        $this->menickaRepository = $menickaRepository;
        $this->polozkaMenickaRepository = $polozkaMenickaRepository;

        $this->kernel = $kernel;
    }

    public function create(MenickaDto $dto, ?int $id): void
    {
        $datum = $dto->datum;
        $datum = $this->menickaRepository->findOneBy(['datum' => $datum]);
        if ($datum === null) {
            $menicka = new Menicka();
        } else {
            $menicka = $datum;
        }

        $menicka->setDatum($dto->datum);
        foreach ($dto->polozkaMenicka as $polozkaDto) {
            $polozkaDto->setMenicka($menicka);
            $menicka->addPolozkaMenicka($polozkaDto);
        }

        $this->entityManager->persist($menicka);
        $this->entityManager->flush();
    }

    public function getDto(\DateTimeInterface $datum): ?MenickaDto
    {
        $menicko = $this->menickaRepository->findOneBy(['datum' => $datum]);
        if ($menicko === null) {
            return null;
        }

        $dto = new MenickaDto();
        $dto->datum = $menicko->getDatum();
        $dto->polozkaMenicka = $menicko->getPolozkaMenicka();

        return $dto;
    }

    public function remove($id): void
    {
        $menicka = $this->menickaRepository->findOneBy(['id' => $id]);

        if ($menicka) {
            $this->entityManager->remove($menicka);
            $this->entityManager->flush();
        }
    }
    public function removePolozka($id): void
    {
        $polozkaMenicka = $this->polozkaMenickaRepository->findOneBy(['id' => $id]);

        if ($polozkaMenicka) {
            $this->entityManager->remove($polozkaMenicka);
            $this->entityManager->flush();
        }
    }
}
