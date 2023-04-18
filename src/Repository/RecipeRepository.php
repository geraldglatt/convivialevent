<?php

namespace App\Repository;

use App\Entity\Recipe;
use App\Model\SearchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

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
    public function __construct(
        ManagerRegistry $registry,
        private PaginatorInterface $paginatorInterface
    ) {
        parent::__construct($registry, Recipe::class);
    }

    /**
     * Get published recipes
     * 
     * @param int $page
     * @return PaginationInterface
     */
    public function findPublished(int $page): PaginationInterface
    {
        $data = $this->createQueryBuilder('r')
            ->where('r.isPublished = true')
            ->addOrderBy('r.createdAt', 'DESC')
            ->getQuery()
            ->getResult();

            $recipes = $this->paginatorInterface->paginate($data, $page, 6);

            return $recipes;
    }

    /**
     * @param SearchData $searchData
     * @return PaginationInterface
     */
    public function findBySearch(SearchData $searchData): PaginationInterface
        {
        $data = $this->createQueryBuilder('r')
            ->where('r.isPublished = true')
            ->addOrderBy('r.createdAt', 'DESC');

        if(!empty($searchData->q)) {
            $data = $data
                ->andWhere('r.title LIKE :q')
                ->setParameter('q', "%{$searchData->q}%");
        }
        $data = $data
            ->getQuery()
            ->getResult();

        $recipes = $this->paginatorInterface->paginate($data, $searchData->page, 6);

        return $recipes;

        
    }
}