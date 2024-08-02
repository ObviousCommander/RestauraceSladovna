<?php

namespace App\Repository;

use App\Entity\Menicka;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Menicka>
 *
 * @method Menicka|null find($id, $lockMode = null, $lockVersion = null)
 * @method Menicka|null findOneBy(array $criteria, array $orderBy = null)
 * @method Menicka[]    findAll()
 * @method Menicka[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenickaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Menicka::class);
    }
    public function getPodleDatumu(\DateTimeInterface $datum): ?Menicka
    {
        return $this->findOneBy(['datum' => $datum->format('Y-m-d')]);
    }
    public function getVsechny(): ?array
    {
        return $this->findAll();
    }
    public function add(\DateTimeInterface $datum): void
    {
        $menicko = new Menicka();
        $menicko->setDatum($datum);
        $entityManager = $this->getEntityManager();
        $entityManager->persist($menicko);
        $entityManager->flush();
    }
    public function remove(int $id): ?Menicka
    {
        $menicko = $this->findOneBy(['id' => $id]);
        if ($menicko) {
            $entityManager = $this->getEntityManager();
            $entityManager->remove($menicko);
            $entityManager->flush();
        }
        return $menicko;
    }
    public function zmenitDatum(\DateTimeInterface $datum, \DateTimeInterface $noveDatum): void
    {
        $menicko = $this->findOneBy(['datum' => $datum]);
        if ($menicko) {
            $menicko->setDatum($noveDatum);
            $entityManager = $this->getEntityManager();
            $entityManager->persist($menicko);
            $entityManager->flush();
        }
    }
    public function vratAktualniJidelnicky()
    {
        // $currentDate = new \DateTime();
        $currentDate = '2020-10-10';

        // $entityManager = $this->getEntityManager();

        return $this->createQueryBuilder("m")
            ->leftJoin('m.polozkaMenicka', 'pm')
            ->addSelect('pm')
            ->join('pm.jidla', 'j')
            ->addSelect('j')
            ->getQuery()
            ->getResult();

        // $q = $entityManager->createQuery('
        //     SELECT m
        //     FROM App\Entity\Menicka m
        //     LEFT JOIN 
        // ');
        // return $q->getResult();
    }   

    //    /**
//     * @return Menicka[] Returns an array of Menicka objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

    //    public function findOneBySomeField($value): ?Menicka
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
