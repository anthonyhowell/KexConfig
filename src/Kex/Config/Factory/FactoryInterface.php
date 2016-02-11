<?php

namespace Kex\Config\Factory;


/**
 * Interface FactoryInterface
 * @package Kex\Config\Factory
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
interface FactoryInterface
{

    public function createConfig($type, array $options = array());

}