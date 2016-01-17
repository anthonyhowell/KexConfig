<?php

namespace Kex\Config\Factory\Extension;


/**
 * Class AbstractExtension
 * @package Kex\Config\Factory\Extension
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
abstract class AbstractExtension implements ExtensionInterface
{

    protected $types = array();

    public function handlesType($type)
    {
        return (in_array($type, $this->types));
    }

}