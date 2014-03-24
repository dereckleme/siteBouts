<?php

namespace Produto\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdutoTenis
 *
 * @ORM\Table(name="produto_tenis", indexes={@ORM\Index(name="fk_produto_tenis_produto_modelo1", columns={"modelo"}), @ORM\Index(name="fk_produto_tenis_produto_subcategoria1", columns={"subcategoria"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Produto\Entity\ProdutoTenisRepository")
 */
class ProdutoTenis
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtenis", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtenis;

    /**
     * @var string
     *
     * @ORM\Column(name="src", type="string", length=45, nullable=true)
     */
    private $src;

    /**
     * @var string
     *
     * @ORM\Column(name="nosso_numero", type="string", length=45, nullable=true)
     */
    private $nossoNumero;

    /**
     * @var string
     *
     * @ORM\Column(name="numeracao_inicial", type="string", length=45, nullable=true)
     */
    private $numeracaoInicial;

    /**
     * @var string
     *
     * @ORM\Column(name="numeracao_final", type="string", length=45, nullable=true)
     */
    private $numeracaoFinal;

    /**
     * @var \ProdutoModelo
     *
     * @ORM\ManyToOne(targetEntity="ProdutoModelo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modelo", referencedColumnName="idmodelo")
     * })
     */
    private $modeloTenis;

    /**
     * @var \ProdutoSubcategoria
     *
     * @ORM\ManyToOne(targetEntity="ProdutoSubcategoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subcategoria", referencedColumnName="idsubcategoria")
     * })
     */
    private $subcategoriaTenis;
	/**
	 * @return the $idtenis
	 */
	public function getIdtenis() {
		return $this->idtenis;
	}

	/**
	 * @return the $src
	 */
	public function getSrc() {
		return $this->src;
	}

	/**
	 * @return the $nossoNumero
	 */
	public function getNossoNumero() {
		return $this->nossoNumero;
	}

	/**
	 * @return the $numeracaoInicial
	 */
	public function getNumeracaoInicial() {
		return $this->numeracaoInicial;
	}

	/**
	 * @return the $numeracaoFinal
	 */
	public function getNumeracaoFinal() {
		return $this->numeracaoFinal;
	}

	/**
	 * @param number $idtenis
	 */
	public function setIdtenis($idtenis) {
		$this->idtenis = $idtenis;
	}

	/**
	 * @param string $src
	 */
	public function setSrc($src) {
		$this->src = $src;
	}

	/**
	 * @param string $nossoNumero
	 */
	public function setNossoNumero($nossoNumero) {
		$this->nossoNumero = $nossoNumero;
	}

	/**
	 * @param string $numeracaoInicial
	 */
	public function setNumeracaoInicial($numeracaoInicial) {
		$this->numeracaoInicial = $numeracaoInicial;
	}

	/**
	 * @param string $numeracaoFinal
	 */
	public function setNumeracaoFinal($numeracaoFinal) {
		$this->numeracaoFinal = $numeracaoFinal;
	}

	/**
	 * @return the $modeloTenis
	 */
	public function getModeloTenis() {
		return $this->modeloTenis;
	}

	/**
	 * @param ProdutoModelo $modeloTenis
	 */
	public function setModeloTenis($modeloTenis) {
		$this->modeloTenis = $modeloTenis;
	}
	/**
	 * @return the $subcategoriaTenis
	 */
	public function getSubcategoriaTenis() {
		return $this->subcategoriaTenis;
	}

	/**
	 * @param ProdutoSubcategoria $subcategoriaTenis
	 */
	public function setSubcategoriaTenis($subcategoriaTenis) {
		$this->subcategoriaTenis = $subcategoriaTenis;
	}



	
	
}
