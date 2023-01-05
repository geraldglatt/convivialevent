<?php

namespace App\Repository;

use App\Entity\Recipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recipe>
 *
 * @method Recipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recipe[]    findAll()
 * @method Recipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recipe::class);
    }

    public function findTypeAndDifficulty(Recipe $recipe): array {
        return $this->createQueryBuilder('r')
            // ->leftJoin('r.image', 'image')
            // ->where('image.recipe', ':recipe')
            // ->setParameter(':recipe',$recipe->getImage())
            ->andWhere('r.type = :type')
            ->setParameter(':type', $recipe->getType())
            ->andWhere('r.difficulty = :diff')
            ->setParameter(':diff', $recipe->getDifficulty())
            ->getQuery()
            ->getResult();

    //     if($recipe->getType()){

    //         $req = $req->andWhere('r.type = :type')
    //         ->setParameter(':type', $recipe->getType());
    //     }
    //     if($recipe->getDifficulty()){
            
    //         $req = $req->andWhere('r.difficulty = :diff')
    //         ->setParameter(':diff', $recipe->getDifficulty());
    //     }

    //     $req->getQuery();
    //     return $req->getResult();
    }

    public function add(Recipe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Recipe $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Recipe[] Returns an array of Recipe objects
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

//    public function findOneBySomeField($value): ?Recipe
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
