<?php

namespace Produto\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ProdutoPerspectivas
 *
 * @ORM\Table(name="produto_perspectivas", indexes={@ORM\Index(name="fk_produto_perspectivas_produto_tenis_idx", columns={"produto_tenis"})})
 * @ORM\Entity
 */
class ProdutoPerspectivas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_perspectivas", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPerspectivas;

    /**
     * @var string
     *
     * @ORM\Column(name="src", type="string", length=255, nullable=true)
     */
    private $src;

    /**
     * @var \ProdutoTenis
     *
     * @ORM\ManyToOne(targetEntity="ProdutoTenis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produto_tenis", referencedColumnName="idtenis")
     * })
     */
    private $produtoTenis;
	/**
	 * @return the $idPerspectivas
	 */
	public function getIdPerspectivas() {
		return $this->idPerspectivas;
	}

	/**
	 * @return the $src
	 */
	public function getSrc() {
		return $this->src;
	}

	/**
	 * @return the $produtoTenis
	 */
	public function getProdutoTenis() {
		return $this->produtoTenis;
	}

	/**
	 * @param number $idPerspectivas
	 */
	public function setIdPerspectivas($idPerspectivas) {
		$this->idPerspectivas = $idPerspectivas;
	}

	/**
	 * @param string $src
	 */
	public function setSrc($src) {
		$this->src = $src;
	}

	/**
	 * @param ProdutoTenis $produtoTenis
	 */
	public function setProdutoTenis($produtoTenis) {
		$this->produtoTenis = $produtoTenis;
	}


	
}
