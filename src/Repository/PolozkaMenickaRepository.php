<?php

namespace App\Repository;

use App\Entity\PolozkaMenicka;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PolozkaMenicka>
 *
 * @method PolozkaMenicka|null find($id, $lockMode = null, $lockVersion = null)
 * @method PolozkaMenicka|null findOneBy(array $criteria, array $orderBy = null)
 * @method PolozkaMenicka[]    findAll()
 * @method PolozkaMenicka[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PolozkaMenickaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PolozkaMenicka::class);
    }

//    /**
//     * @return PolozkaMenicka[] Returns an array of PolozkaMenicka objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PolozkaMenicka
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
