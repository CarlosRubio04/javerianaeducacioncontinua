<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * LpjConfigmail
 */
class LpjConfigmail
{
    /**
     * @var string
     */
    private $vemail;

    /**
     * @var string
     */
    private $vpassword;

    /**
     * @var string
     */
    private $vnombre;

    /**
     * @var boolean
     */
    private $iestado;

    /**
     * @var boolean
     */
    private $ienvioMail;

    /**
     * @var integer
     */
    private $pkId;


    /**
     * Set vemail
     *
     * @param string $vemail
     * @return LpjConfigmail
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
     * Set vpassword
     *
     * @param string $vpassword
     * @return LpjConfigmail
     */
    public function setVpassword($vpassword)
    {
        $this->vpassword = $vpassword;
    
        return $this;
    }

    /**
     * Get vpassword
     *
     * @return string 
     */
    public function getVpassword()
    {
        return $this->vpassword;
    }

    /**
     * Set vnombre
     *
     * @param string $vnombre
     * @return LpjConfigmail
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
     * Set iestado
     *
     * @param boolean $iestado
     * @return LpjConfigmail
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
     * Set ienvioMail
     *
     * @param boolean $ienvioMail
     * @return LpjConfigmail
     */
    public function setIenvioMail($ienvioMail)
    {
        $this->ienvioMail = $ienvioMail;
    
        return $this;
    }

    /**
     * Get ienvioMail
     *
     * @return boolean 
     */
    public function getIenvioMail()
    {
        return $this->ienvioMail;
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
}
