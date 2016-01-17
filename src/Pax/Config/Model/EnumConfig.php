<?php

namespace Pax\Config\Model;


/**
 * Class EnumConfig
 * @package Pax\Config\Model
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class EnumConfig extends AbstractConfig
{

    protected $options = array();

    /**
     * {@inheritDoc}
     * @param $value
     * @return $this|EnumConfig
     */
    public function setValue($value)
    {
        return $this->setSelectedOption($value);
    }

    /**
     * @param $option
     * @return $this
     */
    public function setSelectedOption(AbstractConfig $option)
    {
        $this->value = $option;
        return $this;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        foreach ($options as $option) {
            $this->addOption($option);
        }

        return $this;
    }

    /**
     * @param AbstractConfig $option
     */
    public function addOption(AbstractConfig $option)
    {
        if (array_key_exists($option->getKey(), $this->options)) return;
        $option->setEnum($this);
        $this->options[$option->getKey()] = $option;
    }

    /**
     * @return ArrayCollection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * {@inheritDoc}
     * @return array
     */
    public function serialize()
    {
        return [
            'type'  => 'enum',
            'key'   => $this->getKey(),
            'label' => $this->getLabel(),
            'value' => ($this->getValue())
                ? $this->getValue()->getValue()
                : null
        ];
    }

    /**
     * {@inheritDoc}
     * @return array
     */
    public function getMap()
    {
        return [
            $this->getKey() => ($this->getValue() instanceof AbstractConfig)
                ? $this->getValue()->getValue()
                : null
        ];
    }

}