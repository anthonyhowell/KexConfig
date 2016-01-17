<?php

namespace Kex\Config\Exception;


class InvalidArgumentException extends \InvalidArgumentException
{

    public static function floatRequired()
    {
        return new self('$value must be a float for FloatConfig');
    }

    public static function integerRequired()
    {
        return new self('$value must be an integer for IntegerConfig');
    }

    public static function stringRequired()
    {
        return new self('$value must be a string for StringOption');
    }

    public static function textRequired()
    {
        return new self('$value must be a string for TextOption');
    }

}