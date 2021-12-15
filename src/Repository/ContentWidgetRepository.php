<?php

namespace App\Repository;

/**
 * ContentWidgetRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContentWidgetRepository extends \Doctrine\ORM\EntityRepository
{
	  public function findByArchive($etat)
    {
        return $this->findBy(array('archive' => $etat),array('title' => 'ASC'));

    }


             public function getWidgetBytype($type)
    {
        $qb = $this
      ->createQueryBuilder('widget')
            ->join('widget.type', 'type')
            ->addSelect('type')
            ->where('type.code = :code')
            ->setParameter('code', $type)
            ->orderBy('widget.id');
    return $qb;

    }   

          public function findWidgetBytype($type)
    {
        $qb = $this
      ->createQueryBuilder('widget')
            ->join('widget.type', 'type')
            ->addSelect('type')
            ->where('type.code = :code')
            ->setParameter('code', $type)
            ->orderBy('widget.id');
     return $qb->getQuery()->getResult();

    }


}
