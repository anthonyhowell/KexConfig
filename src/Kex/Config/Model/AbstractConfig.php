<?php

namespace Kex\Config\Model;

use JsonSerializable;
use Serializable;


/**
 * Class Config
 * @package Kex\Config\Model
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
abstract class AbstractConfig implements ConfigInterface, Serializable, JsonSerializable
{

    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var
     */
    protected $value;


    public function __construct($key = null, $label = null, $value = null)
    {
        if (!is_null($label)) $this->setLabel($label);
        if (!is_null($key))   $this->setKey($key);
        if (!is_null($value)) $this->setValue($value);
    }

    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function serialize()
    {
        return $this->toArray();
    }

    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * {@inheritdoc}
     * @return array
     */
    public function toArray()
    {
        $class = new \ReflectionClass(get_class($this));

        return [
            'type'  => $class->getShortName(),
            'key'   => $this->getkey(),
            'label' => $this->getLabel(),
            'value' => $this->getValue()
        ];
    }


}