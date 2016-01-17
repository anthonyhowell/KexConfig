<?php

namespace Pax\Config\Factory\Extension;


use Pax\Config\Model\ConfigInterface;

/**
 * Class BooleanExtension
 * @package Pax\Config\Factory\Extension
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class BooleanExtension extends AbstractExtension
{

    protected $types = array('bool', 'boolean');

    public function buildOptions(array $options)
    {
        return array_merge(
            array(

            ),
            $options
        );
    }

    public function buildItem(ConfigInterface $config, array $options)
    {
        // TODO: Implement buildItem() method.
    }

}