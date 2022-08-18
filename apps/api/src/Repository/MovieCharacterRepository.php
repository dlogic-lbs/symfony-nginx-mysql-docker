<?php

namespace App\Repository;

use App\Entity\MovieCharacter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MovieCharacter>
 *
 * @method MovieCharacter|null find($id, $lockMode = null, $lockVersion = null)
 * @method MovieCharacter|null findOneBy(array $criteria, array $orderBy = null)
 * @method MovieCharacter[]    findAll()
 * @method MovieCharacter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieCharacterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MovieCharacter::class);
    }

    public function add(MovieCharacter $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MovieCharacter $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getAllNames(string $order = 'ASC')
    {
         return $this->createQueryBuilder('m')
             ->select('m.name')
             ->orderBy('m.name', $order)
            ->getQuery()
            ->getResult()
        ;
    }
}
