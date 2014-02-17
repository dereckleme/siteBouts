<?php

namespace Usuario\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioUser
 *
 * @ORM\Table(name="usuario_user")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Usuario\Entity\UsuarioUserRepository")
 */
class UsuarioUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=45, nullable=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=45, nullable=true)
     */
    private $senha;
	/**
	 * @return the $idUser
	 */
	public function getIdUser() {
		return $this->idUser;
	}

	/**
	 * @return the $login
	 */
	public function getLogin() {
		return $this->login;
	}

	/**
	 * @return the $senha
	 */
	public function getSenha() {
		return $this->senha;
	}

	/**
	 * @param number $idUser
	 */
	public function setIdUser($idUser) {
		$this->idUser = $idUser;
	}

	/**
	 * @param string $login
	 */
	public function setLogin($login) {
		$this->login = $login;
	}

	/**
	 * @param string $senha
	 */
	public function setSenha($senha) {
		$this->senha = $senha;
	}


	
}
