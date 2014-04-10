<?php
namespace Base\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * BaseTipo
 *
 * @ORM\Table(name="base_tipo")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Base\Entity\BaseTipoRepository")
 */
class BaseTipo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtipo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipo;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;
	/**
	 * @return the $idtipo
	 */
	public function getIdtipo() {
		return $this->idtipo;
	}

	/**
	 * @return the $nome
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * @param number $idtipo
	 */
	public function setIdtipo($idtipo) {
		$this->idtipo = $idtipo;
	}

	/**
	 * @param string $nome
	 */
	public function setNome($nome) {
		$this->nome = $nome;
	}


	
}
