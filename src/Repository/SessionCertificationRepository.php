<?php

namespace App\Repository;

/**
 * SessionCertificationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SessionCertificationRepository extends \Doctrine\ORM\EntityRepository
{

	public function getFromDate($date)
	{
		
		$qb = $this
			->createQueryBuilder('s')
			->where("s.datedebut >= :madate")
			->setParameter('madate',$date);

		return $qb->getQuery()->getResult();

	}

	public function getMaxIntitule($debutintitule)
	{
		$resultat=array();

		$sql = "
			select max(intitule) intitule
			from sessions_certifications
			where intitule like '".$debutintitule."%'";
		$conn = $this->_em->getConnection();
		$statement = $conn->executeQuery($sql);
		$resultat = $statement->fetchAll();

		return $resultat[0]['intitule'];
	}

}
