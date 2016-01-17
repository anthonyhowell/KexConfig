<?php

namespace Kex\Config\Model;

use Kex\Config\Exception\InvalidArgumentException;


/**
 * Class FloatConfig
 * @package Kex\Config\Model
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class FloatConfig extends AbstractConfig
{

    /**
     * @param float $value
     * @return $this
     */
    public function setValue($value)
    {
        if (!is_float($value)) {
            throw InvalidArgumentException::floatRequired();
        }

        $this->value = $value;
        return $this;
    }

    /**
     * {@inheritDoc}
     * @return float
     */
    public function getValue()
    {
        return floatval(parent::getValue());
    }

}