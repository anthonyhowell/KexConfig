<?php

namespace Kex\Config\Model;

use Kex\Config\Exception\InvalidArgumentException;


/**
 * Class StringConfig
 * @package Kex\Config\Model
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class StringConfig extends AbstractConfig
{

    /**
     * {@inheritDoc}
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        if (!is_string($value)) {
            throw InvalidArgumentException::stringRequired();
        }

        $this->value = $value;
        return $this;
    }

}