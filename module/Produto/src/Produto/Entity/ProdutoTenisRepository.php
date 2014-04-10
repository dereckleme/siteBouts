<?php

namespace Produto\Entity;

use Doctrine\ORM\EntityRepository;

class ProdutoTenisRepository extends EntityRepository
{
	public function localizaPelaCategoria($slugCategoria)
	{
		$qb =  $this->createQueryBuilder('produto')->setMaxResults(7);
		$qb->select('produto');
		$qb->innerJoin("Produto\Entity\ProdutoSubcategoria", "s","WITH","produto.subcategoriaTenis = s.idsubcategoria");
		$qb->innerJoin("Produto\Entity\ProdutoCategoria", "c","WITH","c.idcategoria = s.categoria");
		$qb->where("c.slug = '$slugCategoria'");
		$query = $qb->getQuery();
		$results = $query->getResult();
		return $results;
	}
	public function localizaPelaSubcategoria($slugCategoria, $slugSubcategoria)
	{
		$qb =  $this->createQueryBuilder('produto')->setMaxResults(7);
		$qb->select('produto');
		$qb->innerJoin("Produto\Entity\ProdutoSubcategoria", "s","WITH","produto.subcategoriaTenis = s.idsubcategoria");
		$qb->innerJoin("Produto\Entity\ProdutoCategoria", "c","WITH","c.idcategoria = s.categoria");
		$qb->where("c.slug = '$slugCategoria'");
		$qb->andWhere("s.slug = '$slugSubcategoria'");
		$query = $qb->getQuery();
		$results = $query->getResult();
		return $results;
	}
}