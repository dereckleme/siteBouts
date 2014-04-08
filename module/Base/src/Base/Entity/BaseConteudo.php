<?php

namespace Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BaseConteudo
 *
 * @ORM\Table(name="base_conteudo", indexes={@ORM\Index(name="fk_base_conteudo_base_submenu1_idx", columns={"submenu"}), @ORM\Index(name="fk_base_conteudo_base_menu1_idx", columns={"menu"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Base\Entity\BaseConteudoRepository")
 */
class BaseConteudo
{
	public function __construct() {
		$this->fotos = new ArrayCollection();
	}
	/**
	 * @ORM\OneToMany(targetEntity="BaseImagens", mappedBy="conteudo")
	 */
	private $fotos;
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="idconteudo", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $idconteudo;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="logo", type="string", length=255, nullable=true)
	 */
	private $logo;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="descricao", type="text", nullable=true)
	 */
	private $descricao;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="src", type="string", length=255, nullable=true)
	 */
	private $src;

	/**
	 * @var \BaseSubmenu
	 *
	 * @ORM\ManyToOne(targetEntity="BaseSubmenu")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="submenu", referencedColumnName="idbase_submenu")
	 * })
	 */
	private $submenu;

	/**
	 * @var \BaseMenu
	 *
	 * @ORM\ManyToOne(targetEntity="BaseMenu")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="menu", referencedColumnName="idmenu")
	 * })
	 */
	private $menu;
	/**
	 * @return the $idconteudo
	 */
	public function getIdconteudo() {
		return $this->idconteudo;
	}

	/**
	 * @return the $logo
	 */
	public function getLogo() {
		return $this->logo;
	}

	/**
	 * @return the $descricao
	 */
	public function getDescricao() {
		return $this->descricao;
	}

	/**
	 * @return the $src
	 */
	public function getSrc() {
		return $this->src;
	}

	/**
	 * @return the $submenu
	 */
	public function getSubmenu() {
		return $this->submenu;
	}

	/**
	 * @return the $menu
	 */
	public function getMenu() {
		return $this->menu;
	}

	/**
	 * @param number $idconteudo
	 */
	public function setIdconteudo($idconteudo) {
		$this->idconteudo = $idconteudo;
	}

	/**
	 * @param string $logo
	 */
	public function setLogo($logo) {
		$this->logo = $logo;
	}

	/**
	 * @param string $descricao
	 */
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}

	/**
	 * @param string $src
	 */
	public function setSrc($src) {
		$this->src = $src;
	}

	/**
	 * @param BaseSubmenu $submenu
	 */
	public function setSubmenu($submenu) {
		$this->submenu = $submenu;
	}

	/**
	 * @param BaseMenu $menu
	 */
	public function setMenu($menu) {
		$this->menu = $menu;
	}
	/**
	 * @return the $fotos
	 */
	public function getFotos() {
		return $this->fotos;
	}

	/**
	 * @param \Base\Entity\ArrayCollection $fotos
	 */
	public function setFotos($fotos) {
		$this->fotos = $fotos;
	}



}
