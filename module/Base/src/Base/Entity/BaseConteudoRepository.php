<?php

namespace Base\Entity;

use Doctrine\ORM\EntityRepository;

class BaseConteudoRepository extends EntityRepository
{
	public function localizaPelaSubcategoria($slugSubcategoria)
	{
		
		$qb =  $this->createQueryBuilder('conteudo');
		$qb->select('conteudo');
		$qb->innerJoin("Base\Entity\BaseSubmenu", "s","WITH","conteudo.submenu = s.idbaseSubmenu");
		$qb->where("s.slug = '$slugSubcategoria'");
		$query = $qb->getQuery();
		$results = $query->getSingleResult();
		//$results = $query->getResult();
		return $results;
	}
}