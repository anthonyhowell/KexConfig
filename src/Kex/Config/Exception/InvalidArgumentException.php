<?php

namespace Kex\Config\Exception;


/**
 * Class InvalidArgumentException
 * @package Kex\Config\Exception
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class InvalidArgumentException extends \InvalidArgumentException
{

    public static function configRequired()
    {
        return new self('$value must be an instance of ConfigInterface');
    }

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