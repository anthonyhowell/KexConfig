<?php

namespace Pax\Config\Model;


/**
 * Interface ConfigInterface
 * @package Pax\Config\Model
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
interface ConfigInterface
{

    /**
     * @param ConfigGroup $group
     * @return ConfigInterface
     */
    public function setGroup(ConfigGroup $group);

    /**
     * @return ConfigGroup
     */
    public function getGroup();

    /**
     * @param $label
     * @return ConfigInterface
     */
    public function setLabel($label);
    public function getLabel();

    /**
     * @param $label
     * @return ConfigInterface
     */
    public function setKey($label);
    public function getKey();

    /**
     * @param $value
     * @return ConfigInterface
     */
    public function setValue($value);
    public function getValue();

    public function getMap();

}