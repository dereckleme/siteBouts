<?php
namespace Base\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * BaseMenu
 *
 * @ORM\Table(name="base_menu", indexes={@ORM\Index(name="fk_base_menu_base_tipo1", columns={"tipo"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Base\Entity\BaseMenuRepository")
 */
class BaseMenu
{
	public function __construct() {
		$this->submenus = new ArrayCollection();
	}
    /**
     * @var integer
     *
     * @ORM\Column(name="idmenu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmenu;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var \BaseTipo
     *
     * @ORM\ManyToOne(targetEntity="BaseTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo", referencedColumnName="idtipo")
     * })
     */
    private $tipo;
    /**
     * @ORM\OneToMany(targetEntity="Base\Entity\BaseSubmenu", mappedBy="menu")
     */
	private $submenus;
	
	
	/**
	 * @var string
	 *
	 * @ORM\Column(name="slug", type="string", length=45, nullable=true)
	 */
	private $slug;
	
	/**
	 * @return the $idmenu
	 */
	public function getIdmenu() {
		return $this->idmenu;
	}

	/**
	 * @return the $nome
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * @return the $tipo
	 */
	public function getTipo() {
		return $this->tipo;
	}

	/**
	 * @return the $submenus
	 */
	public function getSubmenus() {
		return $this->submenus;
	}

	/**
	 * @param number $idmenu
	 */
	public function setIdmenu($idmenu) {
		$this->idmenu = $idmenu;
	}

	/**
	 * @param string $nome
	 */
	public function setNome($nome) {
		$this->nome = $nome;
	}

	/**
	 * @param BaseTipo $tipo
	 */
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}

	/**
	 * @param \Base\Entity\ArrayCollection $submenus
	 */
	public function setSubmenus($submenus) {
		$this->submenus = $submenus;
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
