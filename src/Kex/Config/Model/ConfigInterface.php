<?php

namespace Kex\Config\Model;


/**
 * Interface ConfigInterface
 * @package Kex\Config\Model
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
interface ConfigInterface
{

    /**
     * @param $label
     * @return ConfigInterface
     */
    public function setLabel($label);

    /**
     * @return string
     */
    public function getLabel();

    /**
     * @param $label
     * @return ConfigInterface
     */
    public function setKey($label);

    /**
     * @return string
     */
    public function getKey();

    /**
     * @param $value
     * @return ConfigInterface
     */
    public function setValue($value);

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @return array
     */
    public function toArray();

}