<?php

namespace DoctrineProxies\__CG__\App\Entities\Master;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Role extends \App\Entities\Master\Role implements \Doctrine\ORM\Proxy\Proxy
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
    public static $lazyPropertiesDefaults = [];



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
            return ['__isInitialized__', '' . "\0" . 'App\\Entities\\Master\\Role' . "\0" . 'id', '' . "\0" . 'App\\Entities\\Master\\Role' . "\0" . 'roleName', '' . "\0" . 'App\\Entities\\Master\\Role' . "\0" . 'createdBy', '' . "\0" . 'App\\Entities\\Master\\Role' . "\0" . 'lastUpdateBy', '' . "\0" . 'App\\Entities\\Master\\Role' . "\0" . 'createdDate', '' . "\0" . 'App\\Entities\\Master\\Role' . "\0" . 'lastUpdateDate', '' . "\0" . 'App\\Entities\\Master\\Role' . "\0" . 'users', '' . "\0" . 'App\\Entities\\Master\\Role' . "\0" . 'accessControl'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entities\\Master\\Role' . "\0" . 'id', '' . "\0" . 'App\\Entities\\Master\\Role' . "\0" . 'roleName', '' . "\0" . 'App\\Entities\\Master\\Role' . "\0" . 'createdBy', '' . "\0" . 'App\\Entities\\Master\\Role' . "\0" . 'lastUpdateBy', '' . "\0" . 'App\\Entities\\Master\\Role' . "\0" . 'createdDate', '' . "\0" . 'App\\Entities\\Master\\Role' . "\0" . 'lastUpdateDate', '' . "\0" . 'App\\Entities\\Master\\Role' . "\0" . 'users', '' . "\0" . 'App\\Entities\\Master\\Role' . "\0" . 'accessControl'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Role $proxy) {
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
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
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
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getRoleName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRoleName', []);

        return parent::getRoleName();
    }

    /**
     * {@inheritDoc}
     */
    public function getAccessControl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccessControl', []);

        return parent::getAccessControl();
    }

    /**
     * {@inheritDoc}
     */
    public function canAccess($resource, $privilege)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'canAccess', [$resource, $privilege]);

        return parent::canAccess($resource, $privilege);
    }

    /**
     * {@inheritDoc}
     */
    public function setRoleName($roleName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRoleName', [$roleName]);

        return parent::setRoleName($roleName);
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedBy($createdBy)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedBy', [$createdBy]);

        return parent::setCreatedBy($createdBy);
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedBy($updateBy)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedBy', [$updateBy]);

        return parent::setUpdatedBy($updateBy);
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedDate($createdDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedDate', [$createdDate]);

        return parent::setCreatedDate($createdDate);
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedDate($updateDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedDate', [$updateDate]);

        return parent::setUpdatedDate($updateDate);
    }

    /**
     * {@inheritDoc}
     */
    public function addAccessControl(\App\Entities\Master\AccessControl $accessControl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addAccessControl', [$accessControl]);

        return parent::addAccessControl($accessControl);
    }

}
