<?php

namespace Kex\Config\Model;
use Kex\Config\Exception\MethodNotAllowedException;


/**
 * Class ChoiceConfig
 * @package Kex\Config\Model
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class ChoiceConfig extends AbstractConfig implements ChoiceConfigInterface
{

    /**
     * @var array
     */
    protected $options = array();

    /**
     * @var int
     */
    protected $limit = 0;


    public function __construct(array $options = array(), array $values = array(), $limit = 0)
    {
        $this->value = array();
        
        $this->addOptions($options);

        foreach ($values as $value) {
            $this->select($value);
        }

        $this->setLabel($limit);
    }
    
    public function addOptions(array $options)
    {
        foreach ($options as $option) {
            $this->addOption($option);
        }
    }

    public function addOption(ConfigInterface $option)
    {
        $this->options[$option->getKey()] = $option;
        return $this;
    }

    public function removeOption(ConfigInterface $option)
    {
        unset($this->options[$option->getKey()]);
        return $this;
    }

    public function hasOption(ConfigInterface $option)
    {
        return (array_key_exists($option->getKey(), $this->options));
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function allowsSelection(ConfigInterface $option)
    {
        // Unlimited choices
        if (0 == $this->limit) {
            return true;
        }

        if (count($this->value) < $this->limit) {
            return true;
        }

        return false;
    }

    public function select(ConfigInterface $option)
    {
        if (!$this->allowsSelection($option)) {
            throw MethodNotAllowedException::newChoiceValueNotAllowed($this->limit);
        }

        $this->value[$option->getKey()] = $option;
        return $this;
    }

    public function unSelect(ConfigInterface $option)
    {
        unset($this->value[$option->getKey()]);
        return $this;
    }

    public function getSelection()
    {
        return $this->value;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * {@inheritdoc}
     * @return mixed
     */
    public function getValue()
    {
        if ($this->limit == 1) {
            return current($this->value);
        }

        return parent::getValue();
    }


}