<?php
namespace Base\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * BaseNewslatter
 *
 * @ORM\Table(name="base_newslatter")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Base\Entity\BaseNewslatterRepository")
 */
class BaseNewslatter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idnewslatter", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idnewslatter;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="base_newslattercol", type="string", length=45, nullable=true)
     */
    private $baseNewslattercol;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="datetime", nullable=true)
     */
    private $data = 'CURRENT_TIMESTAMP';
	/**
	 * @return the $idnewslatter
	 */
	public function getIdnewslatter() {
		return $this->idnewslatter;
	}

	/**
	 * @return the $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return the $baseNewslattercol
	 */
	public function getBaseNewslattercol() {
		return $this->baseNewslattercol;
	}

	/**
	 * @return the $data
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * @param number $idnewslatter
	 */
	public function setIdnewslatter($idnewslatter) {
		$this->idnewslatter = $idnewslatter;
	}

	/**
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @param string $baseNewslattercol
	 */
	public function setBaseNewslattercol($baseNewslattercol) {
		$this->baseNewslattercol = $baseNewslattercol;
	}

	/**
	 * @param DateTime $data
	 */
	public function setData($data) {
		$this->data = $data;
	}


	
}
