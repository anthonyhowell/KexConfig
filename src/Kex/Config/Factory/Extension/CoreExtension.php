<?php

namespace Kex\Config\Factory\Extension;

use Kex\Config\Model\ConfigInterface;


/**
 * Class CoreExtension
 * @package Kex\Config\Factory\Extension
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class CoreExtension extends AbstractExtension
{

    protected $types = array(
        'boolean', 'bool',
        'date',
        'float',
        'integer', 'int',
        'string',
        'text'
    );

    public function buildOptions(array $options)
    {
        return array_merge(
            array(
                'group' => null,
                'key'   => null,
                'label' => null,
                'value' => null
            ),
            $options
        );
    }

    public function buildItem(ConfigInterface $config, array $options)
    {
        $config
            ->setGroup($options['group'])
            ->setKey($options['key'])
            ->setLabel($options['label'])
            ->setValue($options['value']);
    }




}