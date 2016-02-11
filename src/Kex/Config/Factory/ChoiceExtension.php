<?php

namespace Kex\Config\Factory;


use Kex\Config\Model\ChoiceConfig;
use Kex\Config\Model\MultiChoiceConfig;
use Kex\Config\Model\SingleChoiceConfig;

/**
 * Class ChoiceExtension
 * @package Kex\Config\Factory
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class ChoiceExtension implements ExtensionInterface
{

    private $types;

    public function handles($type)
    {
        return ('choice' == $type);
    }

    public function buildOptions(array $options)
    {
        if (!isset($options['options'])) {
            $options['options'] = array();
        }

        $options = array_merge(
            array(
                'key'   => null,
                'label' => null,
                'value' => null,
                'limit' => 0
            ),
            $options
        );

        if (count($options['options']) == 0) {
            $options['options'][] = array(
                'type'  => 'bool',
                'key'   => null,
                'label' => null,
                'value' => true
            );
        }

        return $options;
    }

    public function build($type, array $options = array(), ConfigFactory $factory)
    {
        $options = $this->buildOptions($options);

        $config = new ChoiceConfig();
        $config->setKey($options['key']);
        $config->setLabel($options['label']);
        $config->setLimit($options['limit']);

        foreach ($options['options'] as $option) {
            $config->addOption($factory->createConfig($option['type'], $option));
        }

        return $config;
    }

}