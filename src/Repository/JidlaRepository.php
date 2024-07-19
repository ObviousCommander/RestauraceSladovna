<?php

namespace App\Repository;

use App\Entity\Jidla;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Jidla>
 *
 * @method Jidla|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jidla|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jidla[]    findAll()
 * @method Jidla[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JidlaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jidla::class);
    }

    public function getPodleNazvu(string $nazev): ?Jidla
    {
        return $this->findOneBy(['nazev' => $nazev]);
    }

    public function getVsechny(): ?array
    {
        return $this->findAll();
    }

    public function add(string $nazev, int $cena): void
    {
        $jidla = new Jidla();
        $jidla->setNazev($nazev);
        $jidla->setCena($cena);
        $entityManager = $this->getEntityManager();
        $entityManager->persist($jidla);
        $entityManager->flush();
    }

    public function remove(string $nazev): ?Jidla
    {
        $jidla = $this->findOneBy(['nazev' => $nazev]);
        if ($jidla) {
            $entityManager = $this->getEntityManager();
            $entityManager->remove($jidla);
            $entityManager->flush();
        }
        return $jidla;
    }
//    /**
//     * @return Jidla[] Returns an array of Jidla objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('j.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Jidla
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
