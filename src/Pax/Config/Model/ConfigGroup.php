<?php

namespace Pax\Config\Model;


/**
 * Class ConfigGroup
 * @package Pax\Config\Model
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class ConfigGroup
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
     * ConfigGroup constructor.
     * @param string $key
     * @param string $label
     */
    public function __construct($key, $label)
    {
        $this->key = $key;
        $this->label = $label;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getLabel()
    {
        return $this->label;
    }

}