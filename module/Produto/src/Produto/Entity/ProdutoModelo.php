<?php

namespace Produto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdutoModelo
 *
 * @ORM\Table(name="produto_modelo")
 * @ORM\Entity
 */
class ProdutoModelo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idmodelo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmodelo;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;
	/**
	 * @return the $idmodelo
	 */
	public function getIdmodelo() {
		return $this->idmodelo;
	}

	/**
	 * @return the $nome
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * @param number $idmodelo
	 */
	public function setIdmodelo($idmodelo) {
		$this->idmodelo = $idmodelo;
	}

	/**
	 * @param string $nome
	 */
	public function setNome($nome) {
		$this->nome = $nome;
	}



}
