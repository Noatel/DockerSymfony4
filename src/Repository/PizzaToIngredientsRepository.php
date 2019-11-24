<?php

namespace App\Repository;

use App\Entity\PizzaToIngredients;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PizzaToIngredients|null find($id, $lockMode = null, $lockVersion = null)
 * @method PizzaToIngredients|null findOneBy(array $criteria, array $orderBy = null)
 * @method PizzaToIngredients[]    findAll()
 * @method PizzaToIngredients[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PizzaToIngredientsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PizzaToIngredients::class);
    }

    // /**
    //  * @return PizzaToIngredients[] Returns an array of PizzaToIngredients objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PizzaToIngredients
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
