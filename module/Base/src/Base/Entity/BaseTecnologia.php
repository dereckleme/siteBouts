<?php
namespace Base\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * BaseTecnologia
 *
 * @ORM\Table(name="base_tecnologia", indexes={@ORM\Index(name="fk_base_tecnologia_produto_tenis1_idx", columns={"tenis"}), @ORM\Index(name="fk_base_tecnologia_base_submenu1_idx", columns={"tecnologia"})})
 * @ORM\Entity
 */
class BaseTecnologia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tecnologia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTecnologia;

    /**
     * @var \ProdutoTenis
     *
     * @ORM\ManyToOne(targetEntity="Produto\Entity\ProdutoTenis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tenis", referencedColumnName="idtenis")
     * })
     */
    private $parenttenis;

    /**
     * @var \BaseSubmenu
     *
     * @ORM\ManyToOne(targetEntity="BaseSubmenu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tecnologia", referencedColumnName="idbase_submenu")
     * })
     */
    private $parenttecnologia;
	/**
	 * @return the $idTecnologia
	 */
	public function getIdTecnologia() {
		return $this->idTecnologia;
	}

	/**
	 * @return the $parenttenis
	 */
	public function getParenttenis() {
		return $this->parenttenis;
	}

	/**
	 * @return the $parenttecnologia
	 */
	public function getParenttecnologia() {
		return $this->parenttecnologia;
	}

	/**
	 * @param number $idTecnologia
	 */
	public function setIdTecnologia($idTecnologia) {
		$this->idTecnologia = $idTecnologia;
	}

	/**
	 * @param ProdutoTenis $parenttenis
	 */
	public function setParenttenis($parenttenis) {
		$this->parenttenis = $parenttenis;
	}

	/**
	 * @param BaseSubmenu $parenttecnologia
	 */
	public function setParenttecnologia($parenttecnologia) {
		$this->parenttecnologia = $parenttecnologia;
	}

	



}
