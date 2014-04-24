<?php
namespace Base\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * BaseSubmenu
 *
 * @ORM\Table(name="base_submenu", indexes={@ORM\Index(name="fk_base_submenu_base_menu1", columns={"menu"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Base\Entity\BaseSubmenuRepository")
 */
class BaseSubmenu
{
	/**
	 * @ORM\OneToOne(targetEntity="BaseConteudo", mappedBy="submenu")
	 */
	private $conteudo;
      /**
     * @var integer
     *
     * @ORM\Column(name="idbase_submenu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbaseSubmenu;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=45, nullable=true)
     */
    private $slug;

    /**
     * @var \BaseMenu
     *
     * @ORM\ManyToOne(targetEntity="BaseMenu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="menu", referencedColumnName="idmenu")
     * })
     */
    private $Basemenu;
	/**
	 * @return the $idbaseSubmenu
	 */
	public function getIdbaseSubmenu() {
		return $this->idbaseSubmenu;
	}

	/**
	 * @return the $nome
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * @return the $slug
	 */
	public function getSlug() {
		return $this->slug;
	}


	/**
	 * @param number $idbaseSubmenu
	 */
	public function setIdbaseSubmenu($idbaseSubmenu) {
		$this->idbaseSubmenu = $idbaseSubmenu;
	}

	/**
	 * @param string $nome
	 */
	public function setNome($nome) {
		$this->nome = $nome;
	}

	/**
	 * @param string $slug
	 */
	public function setSlug($slug) {
		$this->slug = $slug;
	}
	/**
	 * @return the $Basemenu
	 */
	public function getBasemenu() {
		return $this->Basemenu;
	}

	/**
	 * @param BaseMenu $Basemenu
	 */
	public function setBasemenu($Basemenu) {
		$this->Basemenu = $Basemenu;
	}
	/**
	 * @return the $conteudo
	 */
	public function getConteudo() {
		return $this->conteudo;
	}

	/**
	 * @param field_type $conteudo
	 */
	public function setConteudo($conteudo) {
		$this->conteudo = $conteudo;
	}

	

	
}
