<?php

namespace App\Repository;

use App\Entity\Admini;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Admini>
 *
 * @method Admini|null find($id, $lockMode = null, $lockVersion = null)
 * @method Admini|null findOneBy(array $criteria, array $orderBy = null)
 * @method Admini[]    findAll()
 * @method Admini[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Admini::class);
    }

//    /**
//     * @return Admini[] Returns an array of Admini objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Admini
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
