<?php

namespace Pax\Config\Model;


/**
 * Class BooleanConfig
 * @package Pax\Config\Model
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