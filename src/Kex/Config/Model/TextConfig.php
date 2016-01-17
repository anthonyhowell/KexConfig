<?php

namespace Kex\Config\Model;

use Kex\Config\Exception\InvalidArgumentException;


/**
 * Class TextConfig
 * @package Pax\Config\Model
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class TextConfig extends AbstractConfig
{

    /**
     * {@inheritDoc}
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        if (!is_string($value)) {
            throw InvalidArgumentException::textRequired();
        }

        $this->value = $value;
        return $this;
    }

}