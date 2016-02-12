<?php

namespace Kex\Config\Factory;

use Kex\Config\Model\BooleanConfig;
use Kex\Config\Model\DateConfig;
use Kex\Config\Model\FloatConfig;
use Kex\Config\Model\IntegerConfig;
use Kex\Config\Model\StringConfig;
use Kex\Config\Model\TextConfig;


/**
 * Class CoreExtension
 * @package Kex\Config\Factory
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class CoreExtension implements ExtensionInterface
{

    /**
     * @var array
     */
    private $types;


    public function __construct()
    {
        $this->types = [
            'boolean' => function () { return new BooleanConfig(); },
            'bool'    => function () { return new BooleanConfig(); },
            'date'    => function () { return new DateConfig(); },
            'float'   => function () { return new FloatConfig(); },
            'integer' => function () { return new IntegerConfig(); },
            'int'     => function () { return new IntegerConfig(); },
            'string'  => function () { return new StringConfig(); },
            'text'    => function () { return new TextConfig(); },
        ];
    }

    public function handles($type)
    {
        return array_key_exists($type, $this->types);
    }

    public function buildOptions(array $options)
    {
        return array_merge(
            [
                'key'   => null,
                'label' => null,
                'value' => null
            ],
            $options
        );
    }

    public function build($type, array $options = [], ConfigFactory $factory)
    {
        $options = $this->buildOptions($options);

        $class = $this->types[$type];

        /** @var \Kex\config\Model\ConfigInterface $config */
        $config = $class();
        $config->setKey($options['key']);
        $config->setLabel($options['label']);
        $config->setValue($options['value']);

        return $config;
    }

}