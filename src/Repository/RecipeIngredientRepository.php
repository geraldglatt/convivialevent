<?php

namespace App\Repository;

use App\Entity\RecipeIngredient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RecipeIngredient>
 *
 * @method RecipeIngredient|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecipeIngredient|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecipeIngredient[]    findAll()
 * @method RecipeIngredient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeIngredientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecipeIngredient::class);
    }

    public function add(RecipeIngredient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(RecipeIngredient $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   /**
    * @return RecipeIngredient[] Returns an array of RecipeIngredient objects
    */
    public function findIdByRecipeIngredient($id): array
    {
        return $this->createQueryBuilder('p')
        ->andWhere('p.id = :id')
        ->setParameter(':id', $id)
        ->getQuery()
        ->getResult();
    }

    public function findIngredientByRecipe($id,RecipeIngredientRepository $recipeIngredient){
        return $recipeIngredient->findBy([
            'recipe' => $id,
        ]);
    }

//    public function findOneBySomeField($value): ?RecipeIngredient
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
