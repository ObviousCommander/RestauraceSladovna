<?php

namespace App\Repository;

use App\Entity\Rezervace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Rezervace>
 *
 * @method Rezervace|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rezervace|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rezervace[]    findAll()
 * @method Rezervace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RezervaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rezervace::class);
    }

//    /**
//     * @return Rezervace[] Returns an array of Rezervace objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Rezervace
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
