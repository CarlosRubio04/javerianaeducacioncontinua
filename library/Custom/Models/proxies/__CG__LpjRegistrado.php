<?php

namespace DoctrineProxies\__CG__;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class LpjRegistrado extends \LpjRegistrado implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'LpjRegistrado' . "\0" . 'vnombre', '' . "\0" . 'LpjRegistrado' . "\0" . 'vapellido', '' . "\0" . 'LpjRegistrado' . "\0" . 'vemail', '' . "\0" . 'LpjRegistrado' . "\0" . 'icelular', '' . "\0" . 'LpjRegistrado' . "\0" . 'icontactar', '' . "\0" . 'LpjRegistrado' . "\0" . 'vtarget', '' . "\0" . 'LpjRegistrado' . "\0" . 'vip', '' . "\0" . 'LpjRegistrado' . "\0" . 'dtfechaRegistro', '' . "\0" . 'LpjRegistrado' . "\0" . 'pkId', '' . "\0" . 'LpjRegistrado' . "\0" . 'lpjProgramaPk');
        }

        return array('__isInitialized__', '' . "\0" . 'LpjRegistrado' . "\0" . 'vnombre', '' . "\0" . 'LpjRegistrado' . "\0" . 'vapellido', '' . "\0" . 'LpjRegistrado' . "\0" . 'vemail', '' . "\0" . 'LpjRegistrado' . "\0" . 'icelular', '' . "\0" . 'LpjRegistrado' . "\0" . 'icontactar', '' . "\0" . 'LpjRegistrado' . "\0" . 'vtarget', '' . "\0" . 'LpjRegistrado' . "\0" . 'vip', '' . "\0" . 'LpjRegistrado' . "\0" . 'dtfechaRegistro', '' . "\0" . 'LpjRegistrado' . "\0" . 'pkId', '' . "\0" . 'LpjRegistrado' . "\0" . 'lpjProgramaPk');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (LpjRegistrado $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function setVnombre($vnombre)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVnombre', array($vnombre));

        return parent::setVnombre($vnombre);
    }

    /**
     * {@inheritDoc}
     */
    public function getVnombre()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVnombre', array());

        return parent::getVnombre();
    }

    /**
     * {@inheritDoc}
     */
    public function setVapellido($vapellido)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVapellido', array($vapellido));

        return parent::setVapellido($vapellido);
    }

    /**
     * {@inheritDoc}
     */
    public function getVapellido()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVapellido', array());

        return parent::getVapellido();
    }

    /**
     * {@inheritDoc}
     */
    public function setVemail($vemail)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVemail', array($vemail));

        return parent::setVemail($vemail);
    }

    /**
     * {@inheritDoc}
     */
    public function getVemail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVemail', array());

        return parent::getVemail();
    }

    /**
     * {@inheritDoc}
     */
    public function setIcelular($icelular)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIcelular', array($icelular));

        return parent::setIcelular($icelular);
    }

    /**
     * {@inheritDoc}
     */
    public function getIcelular()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIcelular', array());

        return parent::getIcelular();
    }

    /**
     * {@inheritDoc}
     */
    public function setIcontactar($icontactar)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIcontactar', array($icontactar));

        return parent::setIcontactar($icontactar);
    }

    /**
     * {@inheritDoc}
     */
    public function getIcontactar()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIcontactar', array());

        return parent::getIcontactar();
    }

    /**
     * {@inheritDoc}
     */
    public function setVtarget($vtarget)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVtarget', array($vtarget));

        return parent::setVtarget($vtarget);
    }

    /**
     * {@inheritDoc}
     */
    public function getVtarget()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVtarget', array());

        return parent::getVtarget();
    }

    /**
     * {@inheritDoc}
     */
    public function setVip($vip)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVip', array($vip));

        return parent::setVip($vip);
    }

    /**
     * {@inheritDoc}
     */
    public function getVip()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVip', array());

        return parent::getVip();
    }

    /**
     * {@inheritDoc}
     */
    public function setDtfechaRegistro($dtfechaRegistro)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDtfechaRegistro', array($dtfechaRegistro));

        return parent::setDtfechaRegistro($dtfechaRegistro);
    }

    /**
     * {@inheritDoc}
     */
    public function getDtfechaRegistro()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDtfechaRegistro', array());

        return parent::getDtfechaRegistro();
    }

    /**
     * {@inheritDoc}
     */
    public function getPkId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getPkId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPkId', array());

        return parent::getPkId();
    }

    /**
     * {@inheritDoc}
     */
    public function setLpjProgramaPk(\LpjPrograma $lpjProgramaPk = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLpjProgramaPk', array($lpjProgramaPk));

        return parent::setLpjProgramaPk($lpjProgramaPk);
    }

    /**
     * {@inheritDoc}
     */
    public function getLpjProgramaPk()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLpjProgramaPk', array());

        return parent::getLpjProgramaPk();
    }

}
