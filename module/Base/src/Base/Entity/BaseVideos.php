<?php
namespace Base\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * BaseVideos
 *
 * @ORM\Table(name="base_videos", indexes={@ORM\Index(name="fk_base_videos_base_conteudo1_idx", columns={"base_conteudo"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Base\Entity\BaseVideosRepository")
 */
class BaseVideos
{
	/**
	 * @var string
	 *
	 * @ORM\Column(name="titulo", type="string", length=255, nullable=true)
	 */
	private $titulo;
    /**
     * @var integer
     *
     * @ORM\Column(name="id_videos", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVideos;

    /**
     * @var string
     *
     * @ORM\Column(name="url_youtube", type="string", length=255, nullable=true)
     */
    private $urlYoutube;

    /**
     * @var \BaseConteudo
     *
     * @ORM\ManyToOne(targetEntity="BaseConteudo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="base_conteudo", referencedColumnName="idconteudo")
     * })
     */
    private $conteudoOriginal;
	/**
	 * @return the $idVideos
	 */
	public function getIdVideos() {
		return $this->idVideos;
	}

	/**
	 * @return the $urlYoutube
	 */
	public function getUrlYoutube() {
		return $this->urlYoutube;
	}

	

	/**
	 * @param number $idVideos
	 */
	public function setIdVideos($idVideos) {
		$this->idVideos = $idVideos;
	}

	/**
	 * @param string $urlYoutube
	 */
	public function setUrlYoutube($urlYoutube) {
		$this->urlYoutube = $urlYoutube;
	}

	/**
	 * @return the $titulo
	 */
	public function getTitulo() {
		return $this->titulo;
	}

	/**
	 * @param string $titulo
	 */
	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}
	/**
	 * @return the $conteudoOriginal
	 */
	public function getConteudoOriginal() {
		return $this->conteudoOriginal;
	}

	/**
	 * @param BaseConteudo $conteudoOriginal
	 */
	public function setConteudoOriginal($conteudoOriginal) {
		$this->conteudoOriginal = $conteudoOriginal;
	}



	
	
}
