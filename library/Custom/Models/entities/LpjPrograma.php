<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * LpjPrograma
 */
class LpjPrograma
{
    /**
     * @var string
     */
    private $vnombre;

    /**
     * @var integer
     */
    private $ihoras;

    /**
     * @var \DateTime
     */
    private $dinicio;

    /**
     * @var string
     */
    private $vperfil;

    /**
     * @var string
     */
    private $vdescripcion;

    /**
     * @var string
     */
    private $vdetalle;

    /**
     * @var boolean
     */
    private $iestado;

    /**
     * @var integer
     */
    private $ivalor;

    /**
     * @var string
     */
    private $vurlImagen;

    /**
     * @var string
     */
    private $vurlVideo;

    /**
     * @var string
     */
    private $vtelefono;

    /**
     * @var integer
     */
    private $pkId;

    /**
     * @var \LpjFacultad
     */
    private $lpjFacultadPk;

    /**
     * @var \LpjCategoria
     */
    private $lpjCategoriaPk;


    /**
     * Set vnombre
     *
     * @param string $vnombre
     * @return LpjPrograma
     */
    public function setVnombre($vnombre)
    {
        $this->vnombre = $vnombre;
    
        return $this;
    }

    /**
     * Get vnombre
     *
     * @return string 
     */
    public function getVnombre()
    {
        return $this->vnombre;
    }

    /**
     * Set ihoras
     *
     * @param integer $ihoras
     * @return LpjPrograma
     */
    public function setIhoras($ihoras)
    {
        $this->ihoras = $ihoras;
    
        return $this;
    }

    /**
     * Get ihoras
     *
     * @return integer 
     */
    public function getIhoras()
    {
        return $this->ihoras;
    }

    /**
     * Set dinicio
     *
     * @param \DateTime $dinicio
     * @return LpjPrograma
     */
    public function setDinicio($dinicio)
    {
        $this->dinicio = $dinicio;
    
        return $this;
    }

    /**
     * Get dinicio
     *
     * @return \DateTime 
     */
    public function getDinicio()
    {
        return $this->dinicio;
    }

    /**
     * Set vperfil
     *
     * @param string $vperfil
     * @return LpjPrograma
     */
    public function setVperfil($vperfil)
    {
        $this->vperfil = $vperfil;
    
        return $this;
    }

    /**
     * Get vperfil
     *
     * @return string 
     */
    public function getVperfil()
    {
        return $this->vperfil;
    }

    /**
     * Set vdescripcion
     *
     * @param string $vdescripcion
     * @return LpjPrograma
     */
    public function setVdescripcion($vdescripcion)
    {
        $this->vdescripcion = $vdescripcion;
    
        return $this;
    }

    /**
     * Get vdescripcion
     *
     * @return string 
     */
    public function getVdescripcion()
    {
        return $this->vdescripcion;
    }

    /**
     * Set vdetalle
     *
     * @param string $vdetalle
     * @return LpjPrograma
     */
    public function setVdetalle($vdetalle)
    {
        $this->vdetalle = $vdetalle;
    
        return $this;
    }

    /**
     * Get vdetalle
     *
     * @return string 
     */
    public function getVdetalle()
    {
        return $this->vdetalle;
    }

    /**
     * Set iestado
     *
     * @param boolean $iestado
     * @return LpjPrograma
     */
    public function setIestado($iestado)
    {
        $this->iestado = $iestado;
    
        return $this;
    }

    /**
     * Get iestado
     *
     * @return boolean 
     */
    public function getIestado()
    {
        return $this->iestado;
    }

    /**
     * Set ivalor
     *
     * @param integer $ivalor
     * @return LpjPrograma
     */
    public function setIvalor($ivalor)
    {
        $this->ivalor = $ivalor;
    
        return $this;
    }

    /**
     * Get ivalor
     *
     * @return integer 
     */
    public function getIvalor()
    {
        return $this->ivalor;
    }

    /**
     * Set vurlImagen
     *
     * @param string $vurlImagen
     * @return LpjPrograma
     */
    public function setVurlImagen($vurlImagen)
    {
        $this->vurlImagen = $vurlImagen;
    
        return $this;
    }

    /**
     * Get vurlImagen
     *
     * @return string 
     */
    public function getVurlImagen()
    {
        return $this->vurlImagen;
    }

    /**
     * Set vurlVideo
     *
     * @param string $vurlVideo
     * @return LpjPrograma
     */
    public function setVurlVideo($vurlVideo)
    {
        $this->vurlVideo = $vurlVideo;
    
        return $this;
    }

    /**
     * Get vurlVideo
     *
     * @return string 
     */
    public function getVurlVideo()
    {
        return $this->vurlVideo;
    }

    /**
     * Set vtelefono
     *
     * @param string $vtelefono
     * @return LpjPrograma
     */
    public function setVtelefono($vtelefono)
    {
        $this->vtelefono = $vtelefono;
    
        return $this;
    }

    /**
     * Get vtelefono
     *
     * @return string 
     */
    public function getVtelefono()
    {
        return $this->vtelefono;
    }

    /**
     * Get pkId
     *
     * @return integer 
     */
    public function getPkId()
    {
        return $this->pkId;
    }

    /**
     * Set lpjFacultadPk
     *
     * @param \LpjFacultad $lpjFacultadPk
     * @return LpjPrograma
     */
    public function setLpjFacultadPk(\LpjFacultad $lpjFacultadPk = null)
    {
        $this->lpjFacultadPk = $lpjFacultadPk;
    
        return $this;
    }

    /**
     * Get lpjFacultadPk
     *
     * @return \LpjFacultad 
     */
    public function getLpjFacultadPk()
    {
        return $this->lpjFacultadPk;
    }

    /**
     * Set lpjCategoriaPk
     *
     * @param \LpjCategoria $lpjCategoriaPk
     * @return LpjPrograma
     */
    public function setLpjCategoriaPk(\LpjCategoria $lpjCategoriaPk = null)
    {
        $this->lpjCategoriaPk = $lpjCategoriaPk;
    
        return $this;
    }

    /**
     * Get lpjCategoriaPk
     *
     * @return \LpjCategoria 
     */
    public function getLpjCategoriaPk()
    {
        return $this->lpjCategoriaPk;
    }
}
