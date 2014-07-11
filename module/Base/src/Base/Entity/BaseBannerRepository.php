<?php

namespace Base\Entity;

use Doctrine\ORM\EntityRepository;

class BaseBannerRepository extends EntityRepository
{
	public function findByNao(){
		$qb =  $this->createQueryBuilder('banner');
		$qb->select('banner');
		$qb->where("banner.tipo != 2");
		$query = $qb->getQuery();
		$results = $query->getResult();
    	return $results;
	}
}