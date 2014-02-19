<?php

namespace Produto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdutoCategoria
 *
 * @ORM\Table(name="produto_categoria")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Produto\Entity\ProdutoCategoriaRepository")
 */
class ProdutoCategoria
{
	public function __construct() {
		$this->subcategorias = new ArrayCollection();
	}
	/**
	 * @ORM\OneToMany(targetEntity="Produto\Entity\ProdutoSubcategoria", mappedBy="categoria")
	 */
	private $subcategorias;
    /**
     * @var integer
     *
     * @ORM\Column(name="idcategoria", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;
	/**
	 * @return the $idcategoria
	 */
	public function getIdcategoria() {
		return $this->idcategoria;
	}

	/**
	 * @return the $nome
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * @param number $idcategoria
	 */
	public function setIdcategoria($idcategoria) {
		$this->idcategoria = $idcategoria;
	}

	/**
	 * @param string $nome
	 */
	public function setNome($nome) {
		$this->nome = $nome;
	}
	/**
	 * @return the $subcategorias
	 */
	public function getSubcategorias() {
		return $this->subcategorias;
	}

	/**
	 * @param \Produto\Entity\ArrayCollection $subcategorias
	 */
	public function setSubcategorias($subcategorias) {
		$this->subcategorias = $subcategorias;
	}



	
}
