<?php

namespace App\Repository;

/**
 * ContentSliderRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContentSlideRepository extends \Doctrine\ORM\EntityRepository
{

	
        public function getRang()
    {
        $queryBuilder = $this->createQueryBuilder('f');
        $queryBuilder->select($queryBuilder->expr()->max('f.rang'));
        return (int)$queryBuilder->getQuery()->getScalarResult()[0][1] + 1;
    }
}
