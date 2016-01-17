<?php

namespace Kex\Config\Model;

use Kex\Config\Exception\InvalidArgumentException;


/**
 * Class IntegerConfig
 * @package Kex\Config\Model
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class IntegerConfig extends AbstractConfig
{

    /**
     * {@inheritDoc}
     * @param $value
     * @return $this
     */
    public function setValue($value)
    {
        if (!is_integer($value)) {
            throw InvalidArgumentException::integerRequired();
        }

        $this->value = $value;
        return $this;
    }

}