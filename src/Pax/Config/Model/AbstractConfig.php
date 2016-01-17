<?php

namespace Pax\Config\Model;



/**
 * Class Config
 * @package Pax\Config\Model
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
abstract class AbstractConfig implements ConfigInterface, \Serializable
{

    protected $group;
    protected $key;
    protected $label;
    protected $enum;
    protected $value;

    public function __construct($key = null, $label = null, $value = null, EnumConfig $enum = null)
    {
        if (!is_null($label)) $this->setLabel($label);
        if (!is_null($key))   $this->setKey($key);
        if (!is_null($value)) $this->setValue($value);
        if (!is_null($enum))  $this->setEnum($enum);
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

    public function setGroup(ConfigGroup $group)
    {
        $this->group = $group;
        return $this;
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function setEnum(EnumConfig $enum)
    {
        $this->enum = $enum;
        return $this;
    }

    public function getEnum()
    {
        return $this->enum;
    }

    public function getMap()
    {
        return [$this->getKey()->toString() => $this->getValue()];
    }

    public function serialize()
    {
        $class = new \ReflectionClass(get_class($this));
        $group = ($this->getGroup() !== null)
            ? $this->getGroup()->getCode()
            : null;

        return [
            'type'  => $class->getShortName(),
            'key'   => $this->getkey(),
            'label' => $this->getLabel(),
            'group' => $group,
            'value' => $this->getValue()
        ];
    }

    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }


}