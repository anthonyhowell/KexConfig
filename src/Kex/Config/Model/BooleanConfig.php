<?php

namespace Kex\Config\Model;


/**
 * Class BooleanConfig
 * @package Kex\Config\Model
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class BooleanConfig extends AbstractConfig
{

    /**
     * {@inheritDoc}
     * @param boolean $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = (boolean) $value;
        return $this;
    }

}