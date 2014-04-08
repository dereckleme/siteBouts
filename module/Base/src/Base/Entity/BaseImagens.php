<?php
namespace Base\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * BaseImagens
 *
 * @ORM\Table(name="base_imagens", indexes={@ORM\Index(name="fk_base_imagens_base_conteudo1", columns={"conteudo"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Base\Entity\BaseImagensRepository")
 */
class BaseImagens
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idbase_imagens", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbaseImagens;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo_imagem", type="string", length=45, nullable=true)
     */
    private $tituloImagem;

    /**
     * @var \BaseConteudo
     *
     * @ORM\ManyToOne(targetEntity="BaseConteudo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="conteudo", referencedColumnName="idconteudo")
     * })
     */
    private $conteudo;

    /**
     * @var string
     *
     * @ORM\Column(name="src", type="string", length=255, nullable=true)
     */
    private $src;
	/**
	 * @return the $idbaseImagens
	 */
	public function getIdbaseImagens() {
		return $this->idbaseImagens;
	}

	/**
	 * @return the $tituloImagem
	 */
	public function getTituloImagem() {
		return $this->tituloImagem;
	}

	/**
	 * @return the $conteudo
	 */
	public function getConteudo() {
		return $this->conteudo;
	}

	/**
	 * @return the $src
	 */
	public function getSrc() {
		return $this->src;
	}

	/**
	 * @param number $idbaseImagens
	 */
	public function setIdbaseImagens($idbaseImagens) {
		$this->idbaseImagens = $idbaseImagens;
	}

	/**
	 * @param string $tituloImagem
	 */
	public function setTituloImagem($tituloImagem) {
		$this->tituloImagem = $tituloImagem;
	}

	/**
	 * @param BaseConteudo $conteudo
	 */
	public function setConteudo($conteudo) {
		$this->conteudo = $conteudo;
	}

	/**
	 * @param string $src
	 */
	public function setSrc($src) {
		$this->src = $src;
	}

    

}
