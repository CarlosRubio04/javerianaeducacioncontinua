<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * LpjRegistrado
 */
class LpjRegistrado
{
    /**
     * @var string
     */
    private $vnombre;

    /**
     * @var string
     */
    private $vapellido;

    /**
     * @var string
     */
    private $vemail;

    /**
     * @var integer
     */
    private $icelular;

    /**
     * @var boolean
     */
    private $icontactar;

    /**
     * @var string
     */
    private $vtarget;

    /**
     * @var string
     */
    private $vip;

    /**
     * @var \DateTime
     */
    private $dtfechaRegistro;

    /**
     * @var integer
     */
    private $pkId;

    /**
     * @var \LpjPrograma
     */
    private $lpjProgramaPk;


    /**
     * Set vnombre
     *
     * @param string $vnombre
     * @return LpjRegistrado
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
     * Set vapellido
     *
     * @param string $vapellido
     * @return LpjRegistrado
     */
    public function setVapellido($vapellido)
    {
        $this->vapellido = $vapellido;
    
        return $this;
    }

    /**
     * Get vapellido
     *
     * @return string 
     */
    public function getVapellido()
    {
        return $this->vapellido;
    }

    /**
     * Set vemail
     *
     * @param string $vemail
     * @return LpjRegistrado
     */
    public function setVemail($vemail)
    {
        $this->vemail = $vemail;
    
        return $this;
    }

    /**
     * Get vemail
     *
     * @return string 
     */
    public function getVemail()
    {
        return $this->vemail;
    }

    /**
     * Set icelular
     *
     * @param integer $icelular
     * @return LpjRegistrado
     */
    public function setIcelular($icelular)
    {
        $this->icelular = $icelular;
    
        return $this;
    }

    /**
     * Get icelular
     *
     * @return integer 
     */
    public function getIcelular()
    {
        return $this->icelular;
    }

    /**
     * Set icontactar
     *
     * @param boolean $icontactar
     * @return LpjRegistrado
     */
    public function setIcontactar($icontactar)
    {
        $this->icontactar = $icontactar;
    
        return $this;
    }

    /**
     * Get icontactar
     *
     * @return boolean 
     */
    public function getIcontactar()
    {
        return $this->icontactar;
    }

    /**
     * Set vtarget
     *
     * @param string $vtarget
     * @return LpjRegistrado
     */
    public function setVtarget($vtarget)
    {
        $this->vtarget = $vtarget;
    
        return $this;
    }

    /**
     * Get vtarget
     *
     * @return string 
     */
    public function getVtarget()
    {
        return $this->vtarget;
    }

    /**
     * Set vip
     *
     * @param string $vip
     * @return LpjRegistrado
     */
    public function setVip($vip)
    {
        $this->vip = $vip;
    
        return $this;
    }

    /**
     * Get vip
     *
     * @return string 
     */
    public function getVip()
    {
        return $this->vip;
    }

    /**
     * Set dtfechaRegistro
     *
     * @param \DateTime $dtfechaRegistro
     * @return LpjRegistrado
     */
    public function setDtfechaRegistro($dtfechaRegistro)
    {
        $this->dtfechaRegistro = $dtfechaRegistro;
    
        return $this;
    }

    /**
     * Get dtfechaRegistro
     *
     * @return \DateTime 
     */
    public function getDtfechaRegistro()
    {
        return $this->dtfechaRegistro;
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
     * Set lpjProgramaPk
     *
     * @param \LpjPrograma $lpjProgramaPk
     * @return LpjRegistrado
     */
    public function setLpjProgramaPk(\LpjPrograma $lpjProgramaPk = null)
    {
        $this->lpjProgramaPk = $lpjProgramaPk;
    
        return $this;
    }

    /**
     * Get lpjProgramaPk
     *
     * @return \LpjPrograma 
     */
    public function getLpjProgramaPk()
    {
        return $this->lpjProgramaPk;
    }
}
