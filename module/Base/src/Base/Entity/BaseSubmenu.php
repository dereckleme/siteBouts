<?php
namespace Base\Entity;


use Doctrine\ORM\Mapping as ORM;

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
     * @var integer
     *
     * @ORM\Column(name="idbase_submenu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idbaseSubmenu;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;

    /**
     * @var \BaseMenu
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="BaseMenu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="menu", referencedColumnName="idmenu")
     * })
     */
    private $menu;
    
    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=45, nullable=true)
     */
    private $slug;
    
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
	 * @return the $menu
	 */
	public function getMenu() {
		return $this->menu;
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
	 * @param BaseMenu $menu
	 */
	public function setMenu($menu) {
		$this->menu = $menu;
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
