<?php

namespace Pax\Config\Model;

use Pax\Config\Exception\InvalidArgumentException;


/**
 * Class StringConfig
 * @package Pax\Config\Model
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