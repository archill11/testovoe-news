<?php

namespace App\Repository;

use App\Entity\News;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<News>
 *
 * @method News|null find($id, $lockMode = null, $lockVersion = null)
 * @method News|null findOneBy(array $criteria, array $orderBy = null)
 * @method News[]    findAll()
 * @method News[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsRepository extends ServiceEntityRepository {
  public function __construct(ManagerRegistry $registry) {
    parent::__construct($registry, News::class);
  }

  public function save(News $entity): void {
    $this->getEntityManager()->persist($entity); // сохранить $entity
    $this->getEntityManager()->flush(); // выполнить команду к БД
  }

  public function remove(News $entity): void {
    $this->getEntityManager()->remove($entity); // сохранить $entity
    $this->getEntityManager()->flush(); // выполнить команду к БД
  }

  public function findById(int $id): News {
    return $this->find($id) ; // найти $entity
  }

  public function existsById(int $id): bool {
    return $this->find($id) !== null;
  }

}
