<?php
namespace Produto\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ProdutoSubcategoria
 *
 * @ORM\Table(name="produto_subcategoria", indexes={@ORM\Index(name="fk_produto_subcategoria_produto_categoria1", columns={"categoria"})})
 * @ORM\Entity
 */
class ProdutoSubcategoria
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idsubcategoria", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsubcategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;

    /**
     * @var \ProdutoCategoria
     *
     * @ORM\ManyToOne(targetEntity="ProdutoCategoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria", referencedColumnName="idcategoria")
     * })
     */
    private $categoria;
    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=45, nullable=true)
     */
    private $slug;
	/**
	 * @return the $idsubcategoria
	 */
	public function getIdsubcategoria() {
		return $this->idsubcategoria;
	}

	/**
	 * @return the $nome
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * @return the $categoria
	 */
	public function getCategoria() {
		return $this->categoria;
	}

	/**
	 * @param number $idsubcategoria
	 */
	public function setIdsubcategoria($idsubcategoria) {
		$this->idsubcategoria = $idsubcategoria;
	}

	/**
	 * @param string $nome
	 */
	public function setNome($nome) {
		$this->nome = $nome;
	}

	/**
	 * @param ProdutoCategoria $categoria
	 */
	public function setCategoria($categoria) {
		$this->categoria = $categoria;
	}
	/**
	 * @return the $slug
	 */
	public function getSlug() {
		return $this->slug;
	}

	/**
	 * @param string $slug
	 */
	public function setSlug($slug) {
		$this->slug = $slug;
	}




}
