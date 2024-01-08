<?php

namespace App\Repository;

use App\Entity\Degat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Degat>
 *
 * @method Degat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Degat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Degat[]    findAll()
 * @method Degat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DegatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Degat::class);
    }

//    /**
//     * @return Degat[] Returns an array of Degat objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Degat
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
