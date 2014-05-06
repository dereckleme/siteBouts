<?php
namespace Produto\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ProdutoSugestaoCores
 *
 * @ORM\Table(name="produto_sugestao_cores", indexes={@ORM\Index(name="fk_produto_sugestao_cores_produto_tenis1_idx", columns={"tenis"})})
 * @ORM\Entity
 */
class ProdutoSugestaoCores
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_sugestao_cores", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSugestaoCores;

    /**
     * @var string
     *
     * @ORM\Column(name="src", type="string", length=255, nullable=true)
     */
    private $src;

    /**
     * @var string
     *
     * @ORM\Column(name="nosso_numero", type="string", length=255, nullable=true)
     */
    private $nossoNumero;

    /**
     * @var \ProdutoTenis
     *
     * @ORM\ManyToOne(targetEntity="ProdutoTenis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tenis", referencedColumnName="idtenis")
     * })
     */
    private $tenisProduto;
	/**
	 * @return the $idSugestaoCores
	 */
	public function getIdSugestaoCores() {
		return $this->idSugestaoCores;
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
	 * @param number $idSugestaoCores
	 */
	public function setIdSugestaoCores($idSugestaoCores) {
		$this->idSugestaoCores = $idSugestaoCores;
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
	 * @return the $tenisProduto
	 */
	public function getTenisProduto() {
		return $this->tenisProduto;
	}

	/**
	 * @param ProdutoTenis $tenisProduto
	 */
	public function setTenisProduto($tenisProduto) {
		$this->tenisProduto = $tenisProduto;
	}


	
}
