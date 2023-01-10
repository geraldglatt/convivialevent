<?php

namespace App\Repository;

use App\Entity\PagePdf;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PagePdf>
 *
 * @method PagePdf|null find($id, $lockMode = null, $lockVersion = null)
 * @method PagePdf|null findOneBy(array $criteria, array $orderBy = null)
 * @method PagePdf[]    findAll()
 * @method PagePdf[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PagePdfRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PagePdf::class);
    }

    public function add(PagePdf $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PagePdf $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findpdfpageChampêtre(PagePdfRepository $pagePdfRepository){
        return $pagePdfRepository->findBy([
            'page' => 1,
        ]);
    }

    public function findpdfBypage($id,PagePdfRepository $pagePdfRepository){
        return $pagePdfRepository->findBy([
            'page' => $id,
        ]);
    }

//    /**
//     * @return PagePdf[] Returns an array of PagePdf objects
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

//    public function findOneBySomeField($value): ?PagePdf
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
