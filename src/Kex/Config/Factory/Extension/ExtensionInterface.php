<?php

namespace Kex\Config\Factory\Extension;

use Kex\Config\Model\ConfigInterface;


/**
 * Interface ExtensionInterface
 * @package Kex\Config\Factory\Extension
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
interface ExtensionInterface
{

    /**
     * @param $type
     * @return boolean
     */
    public function handlesType($type);

    /**
     * Build the option array used for the configuration item.
     *
     * @param array $options
     * @return mixed
     */
    public function buildOptions(array $options);

    /**
     * Configure the item with the passed options.
     *
     * @param ConfigInterface $config
     * @param array $options
     * @return mixed
     */
    public function buildItem(ConfigInterface $config, array $options);

}