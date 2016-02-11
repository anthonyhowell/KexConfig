<?php

namespace Kex\Config\Exception;

use InvalidArgumentException;


/**
 * Class MethodNotAllowedException
 * @package Kex\Config\Exception
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class MethodNotAllowedException extends InvalidArgumentException
{

    public static function newChoiceValueNotAllowed($limit)
    {
        return new self("Choice cannot add any new values. Limited to {$limit}.");
    }

}