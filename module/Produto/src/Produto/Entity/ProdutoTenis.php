<?php

namespace Produto\Entity;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * ProdutoTenis
 *
 * @ORM\Table(name="produto_tenis", indexes={@ORM\Index(name="fk_produto_tenis_produto_modelo1", columns={"modelo"}), @ORM\Index(name="fk_produto_tenis_produto_subcategoria1", columns={"subcategoria"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Produto\Entity\ProdutoTenisRepository")
 */
class ProdutoTenis
{
	public function __construct() {
		$this->sugestaoCoresProdutos = new ArrayCollection();
		$this->perspectiva = new ArrayCollection();
	}
	/**
	 * @ORM\OneToMany(targetEntity="Produto\Entity\ProdutoSugestaoCores", mappedBy="tenisProduto")
	 */
	private $sugestaoCoresProdutos;
	/**
	 * @ORM\OneToMany(targetEntity="Produto\Entity\ProdutoPerspectivas", mappedBy="produtoTenis")
	 */
	private $perspectiva;
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
     * @ORM\Column(name="titulo", type="string", length=255, nullable=true)
     */
    private $titulo;
    /**
     * @var string
     * @Gedmo\Slug(fields={"titulo"}, unique=true)
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;
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
     * @var \ProdutoSubcategoria
     *
     * @ORM\ManyToOne(targetEntity="ProdutoSubcategoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subcategoria", referencedColumnName="idsubcategoria")
     * })
     */
    private $subcategoriaTenis;
    
    
    /**
     * @var \BaseSubmenu
     *
     * @ORM\ManyToOne(targetEntity="base\Entity\BaseSubmenu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="base_tecnologia", referencedColumnName="idbase_submenu")
     * })
     */
    private $baseTecnologia;
    
    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text", nullable=true)
     */
    private $descricao;
    
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
	/**
	 * @return the $titulo
	 */
	public function getTitulo() {
		return $this->titulo;
	}


	/**
	 * @param string $titulo
	 */
	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}
	/**
	 * @return the $slug
	 */
	public function getSlug() {
		return $this->slug;
	}
	/**
	 * @return the $baseTecnologia
	 */
	public function getBaseTecnologia() {
		return $this->baseTecnologia;
	}

	/**
	 * @param string $slug
	 */
	public function setSlug($slug) {
		$this->slug = $slug;
	}

	/**
	 * @param BaseSubmenu $baseTecnologia
	 */
	public function setBaseTecnologia($baseTecnologia) {
		$this->baseTecnologia = $baseTecnologia;
	}
	/**
	 * @return the $sugestaoCoresProdutos
	 */
	public function getSugestaoCoresProdutos() {
		return $this->sugestaoCoresProdutos;
	}

	/**
	 * @return the $perspectiva
	 */
	public function getPerspectiva() {
		return $this->perspectiva;
	}

	/**
	 * @param \Doctrine\Common\Collections\ArrayCollection $sugestaoCoresProdutos
	 */
	public function setSugestaoCoresProdutos($sugestaoCoresProdutos) {
		$this->sugestaoCoresProdutos = $sugestaoCoresProdutos;
	}

	/**
	 * @param \Doctrine\Common\Collections\ArrayCollection $perspectiva
	 */
	public function setPerspectiva($perspectiva) {
		$this->perspectiva = $perspectiva;
	}
	/**
	 * @return the $descricao
	 */
	public function getDescricao() {
		return $this->descricao;
	}

	/**
	 * @param string $descricao
	 */
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}



	
	
}
