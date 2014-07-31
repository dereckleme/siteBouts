<?php
namespace Base\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * BaseContato
 *
 * @ORM\Table(name="base_contato")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Base\Entity\BaseContatoRepository")
 */
class BaseContato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_contato", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idContato;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;
	/**
	 * @return the $idContato
	 */
    /**
     * @var string
     *
     * @ORM\Column(name="funcao", type="string", length=255, nullable=true)
     */
    private $funcao;
    
	public function getIdContato() {
		return $this->idContato;
	}

	/**
	 * @return the $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param number $idContato
	 */
	public function setIdContato($idContato) {
		$this->idContato = $idContato;
	}

	/**
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}
	/**
	 * @return the $funcao
	 */
	public function getFuncao() {
		return $this->funcao;
	}

	/**
	 * @param string $funcao
	 */
	public function setFuncao($funcao) {
		$this->funcao = $funcao;
	}



	
}
