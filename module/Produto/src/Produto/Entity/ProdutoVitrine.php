<?php
namespace Produto\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ProdutoVitrine
 *
 * @ORM\Table(name="produto_vitrine", indexes={@ORM\Index(name="fk_produto_vitrine_produto_tenis1_idx", columns={"tenis"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Produto\Entity\ProdutoVitrineRepository")
 */
class ProdutoVitrine
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idvitrine", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvitrine;

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
     *   @ORM\JoinColumn(name="tenis", referencedColumnName="idtenis")
     * })
     */
    private $tenis;
	/**
	 * @return the $idvitrine
	 */
	public function getIdvitrine() {
		return $this->idvitrine;
	}

	/**
	 * @return the $src
	 */
	public function getSrc() {
		return $this->src;
	}

	/**
	 * @return the $tenis
	 */
	public function getTenis() {
		return $this->tenis;
	}

	/**
	 * @param number $idvitrine
	 */
	public function setIdvitrine($idvitrine) {
		$this->idvitrine = $idvitrine;
	}

	/**
	 * @param string $src
	 */
	public function setSrc($src) {
		$this->src = $src;
	}

	/**
	 * @param ProdutoTenis $tenis
	 */
	public function setTenis($tenis) {
		$this->tenis = $tenis;
	}


	
}
