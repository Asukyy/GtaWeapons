<?php

namespace App\Repository;

use App\Entity\Partieducorps;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Partieducorps>
 *
 * @method Partieducorps|null find($id, $lockMode = null, $lockVersion = null)
 * @method Partieducorps|null findOneBy(array $criteria, array $orderBy = null)
 * @method Partieducorps[]    findAll()
 * @method Partieducorps[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartieducorpsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Partieducorps::class);
    }

//    /**
//     * @return Partieducorps[] Returns an array of Partieducorps objects
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

//    public function findOneBySomeField($value): ?Partieducorps
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
