<?php

namespace App\Repository;

use App\Entity\Ttk;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ttk>
 *
 * @method Ttk|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ttk|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ttk[]    findAll()
 * @method Ttk[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TtkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ttk::class);
    }

//    /**
//     * @return Ttk[] Returns an array of Ttk objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Ttk
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
