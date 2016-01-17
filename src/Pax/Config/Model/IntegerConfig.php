<?php

namespace Pax\Config\Model;

use Pax\Config\Exception\InvalidArgumentException;


/**
 * Class IntegerConfig
 * @package Pax\Config\Model
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