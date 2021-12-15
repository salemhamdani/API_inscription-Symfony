<?php

namespace App\Repository;

/**
 * ContentPageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContentPageRepository extends \Doctrine\ORM\EntityRepository
{
  public function findByArchive($etat)
    {
        return $this->findBy(array('archive' => $etat),array('title' => 'ASC'));

    }


      public function findParent()
    {
        return $this->findBy(array('parent' => null ),array('rang' => 'ASC'));

    }

      public function findParentMenu()
    {
        return $this->findBy(array('parent' => null, 'indexEntityType'  => null ),array('rang' => 'ASC'));

    }

      public function findPageParentBytype($type)
    {
        $qb = $this
      ->createQueryBuilder('page')
            ->join('page.typepage', 'type')
            ->addSelect('type')
            ->where('type.code = :code')
            ->andWhere('page.parent IS NULL')
            ->andWhere('page.archive  = :archive')
            ->andWhere('page.indexEntityType IS NULL')
            ->setParameter('code', $type)
            ->setParameter('archive', '0')
            ->orderBy('page.rang');
        return $qb->getQuery()->getResult();

    }


          public function getPageBytype($type)
    {
        $qb = $this
      ->createQueryBuilder('page')
            ->join('page.typepage', 'type')
            ->addSelect('type')
            ->where('type.code = :code')
            ->setParameter('code', $type)
            ->orderBy('page.rang');
    return $qb;

    }

          public function findPageBytype($type)
    {
        $qb = $this
      ->createQueryBuilder('page')
            ->join('page.typepage', 'type')
            ->addSelect('type')
            ->where('type.code = :code')
            ->setParameter('code', $type)
            ->orderBy('page.rang');
        return $qb->getQuery()->getResult();

    }

      public function findByParent($parent)
    {
        return $this->findBy(array('parent' => $parent ),array('rang' => 'ASC'));

    }
    
        public function getRang()
    {
        $queryBuilder = $this->createQueryBuilder('f');
        $queryBuilder->select($queryBuilder->expr()->max('f.rang'));
        return (int)$queryBuilder->getQuery()->getScalarResult()[0][1] + 1;
    }

}