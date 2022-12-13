<?php

namespace App\Repository;

use App\Entity\MetierA;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MetierA>
 *
 * @method MetierA|null find($id, $lockMode = null, $lockVersion = null)
 * @method MetierA|null findOneBy(array $criteria, array $orderBy = null)
 * @method MetierA[]    findAll()
 * @method MetierA[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetierARepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MetierA::class);
    }

    public function save(MetierA $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MetierA $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function SearchByName($name){
        $em=$this->getEntityManager();
        $query=$em->createQuery('
        select m from App\Entity\MetierA m
        where m.nom like :name
        ');
        $query->setParameter("name",'%'.$name.'%');

        return $query->getResult();
    }
    public function filterBySalaire($min,$max){
        $em=$this->getEntitymanager();
        $query=$em->createQuery('
        select m from App\Entity\MetierA m 
        where m.salaire between :min and :max
        ');
        $query->setParameter('min',$min);
        $query->setParameter('max',$max);
        return $query->getResult();
    }
    public function filterByMin($min){
        $em=$this->getEntitymanager();
        $query=$em->createQuery('
        select m from App\Entity\MetierA m 
        where m.salaire>= :min
        ');
        $query->setParameter('min',$min);
        return $query->getResult();
    }
    public function filterByMax($max){
        $em=$this->getEntitymanager();
        $query=$em->createQuery('
        select m from App\Entity\MetierA m 
        where m.salaire<= :max
        ');
        $query->setParameter('max',$max);
        return $query->getResult();
    }
//    /**
//     * @return MetierA[] Returns an array of MetierA objects
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

//    public function findOneBySomeField($value): ?MetierA
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
