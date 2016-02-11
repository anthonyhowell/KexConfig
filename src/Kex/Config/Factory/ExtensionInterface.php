<?php

namespace Kex\Config\Factory;


/**
 * Interface ExtensionInterface
 * @package Kex\Config\Factory
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
interface ExtensionInterface
{

    /**
     * Determines if this extension is the appropriate handler for specified type.
     * @param $type
     * @return boolean
     */
    public function handles($type);

    /**
     * Builds the full option array used to configure the item.
     *
     * @param array $options
     * @return mixed
     */
    public function buildOptions(array $options);

    /**
     * Configures the newly created item with the passed options
     *
     * @param string $type
     * @param array $options
     * @param ConfigFactory $factory
     * @return mixed
     */
    public function build($type, array $options = array(), ConfigFactory $factory);

}