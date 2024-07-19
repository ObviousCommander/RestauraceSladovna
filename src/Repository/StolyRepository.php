<?php

namespace App\Repository;

use App\Entity\Stoly;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Stoly>
 *
 * @method Stoly|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stoly|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stoly[]    findAll()
 * @method Stoly[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StolyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stoly::class);
    }

//    /**
//     * @return Stoly[] Returns an array of Stoly objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Stoly
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
