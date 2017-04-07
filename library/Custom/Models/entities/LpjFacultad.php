<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * LpjFacultad
 */
class LpjFacultad
{
    /**
     * @var string
     */
    private $vnombre;

    /**
     * @var boolean
     */
    private $iestado;

    /**
     * @var integer
     */
    private $pkId;


    /**
     * Set vnombre
     *
     * @param string $vnombre
     * @return LpjFacultad
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
     * @return LpjFacultad
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
     * Get pkId
     *
     * @return integer 
     */
    public function getPkId()
    {
        return $this->pkId;
    }
}
