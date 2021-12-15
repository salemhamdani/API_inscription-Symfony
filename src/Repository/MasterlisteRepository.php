<?php

namespace App\Repository;
use Doctrine\ORM\EntityRepository;

/**
 * listeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MasterlisteRepository extends EntityRepository
{
	
	public function findPrecedent($item)
	{
		$qb = $this
			->createQueryBuilder('m')
            ->where('m.id < :itemid')
            ->setParameters(array(':itemid'=> $item->getId()))
			->orderBy('m.id', 'DESC')
			->setMaxResults(1);
			
		$resultat=$qb->getQuery()->getOneOrNullResult();
		if(is_null($resultat)){
			return $item;
		}else{
			return $resultat;
		}
	}

	public function findSuivant($item)
	{
		$qb = $this
			->createQueryBuilder('m')
            ->where('m.id > :itemid')
            ->setParameters(array(':itemid'=> $item->getId()))
			->orderBy('m.id', 'ASC')
			->setMaxResults(1);
			
		$resultat=$qb->getQuery()->getOneOrNullResult();
		if(is_null($resultat)){
			return $item;
		}else{
			return $resultat;
		}
	}

	public function getNotMaster()
	{
		$qb = $this
			->createQueryBuilder('m')
            ->where('m.module <> :module1 and m.module <> :module2')
            ->setParameters(array(':module1'=>'MASTER',':module2'=>'TOOLBAR'));
		return $qb->getQuery()->getResult();
	}

}
