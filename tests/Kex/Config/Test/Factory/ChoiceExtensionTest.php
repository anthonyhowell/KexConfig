<?php

namespace Config\Test\Factory;

use Kex\Config\Factory\ChoiceExtension;
use Kex\Config\Factory\ConfigFactory;
use Kex\Config\Factory\EnumExtension;
use Kex\Config\Model\ConfigInterface;
use Kex\Config\Model\EnumConfig;
use PHPUnit_Framework_TestCase;


/**
 * Class EnumExtensionTest
 * @package Config\Test\Factory
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class ChoiceExtensionTest extends PHPUnit_Framework_TestCase
{

    public function testBuildOptions()
    {
        $extension = $this->getExtension();

        $options = $extension->buildOptions([]);

        $this->assertArrayHasKey('key',   $options);
        $this->assertArrayHasKey('label', $options);
        $this->assertArrayHasKey('value', $options);

        $this->assertArrayHasKey(0, $options['options']);

        $this->assertArrayHasKey('key',   $options['options'][0]);
        $this->assertArrayHasKey('label', $options['options'][0]);
        $this->assertArrayHasKey('value', $options['options'][0]);
    }

    public function testChoiceConfig()
    {
        /** @var \Kex\Config\Model\EnumConfig $config */
        $config = $this->createConfig();

        $this->assertEquals(null, $config->getKey());
        $this->assertEquals(null, $config->getLabel());

        $enumOptions = $config->getOptions();

        for ($i = 1; $i <= 2; $i++) {
            /** @var \Kex\Config\Model\ConfigInterface $option1 */
            $option = current($enumOptions);
            $this->assertTrue($option instanceof ConfigInterface);
            $this->assertEquals("option_{$i}", $option->getKey());
            $this->assertEquals("option {$i}", $option->getlabel());
            $this->assertEquals($i & 1,        $option->getValue());
            next($enumOptions);
        }
    }

    public function testSingleSelection()
    {
        /** @var \Kex\Config\Model\ChoiceConfig $config */
        $config  = $this->createConfig(['limit' => 1]);
        $options = $config->getOptions();
        $config->select(current($options));

        $this->assertEquals($config->getValue(), current($options));
    }

    public function testMultiSelection()
    {
        /** @var \Kex\Config\Model\ChoiceConfig $config */
        $config  = $this->createConfig();
        $options = $config->getOptions();

        $config->select(current($options));
        $config->select(next($options));

        reset($options);

        /** @var \Kex\Config\Model\ConfigInterface $option */
        foreach ($options as $option) {
            $this->assertArrayHasKey($option->getKey(), $config->getSelection());
        }
    }

    public function createConfig(array $config = [])
    {
        $options = [];

        for ($i = 1; $i <= 2; $i++) {
            $options[] = [
                'type'  => 'bool',
                'key'   => "option_{$i}",
                'label' => "option {$i}",
                'value' => $i & 1
            ];
        }

        $config = array_merge_recursive(
            [ 'options' => $options ],
            $config
        );

        $factory = new ConfigFactory();
        return $factory->createConfig('choice', $config);
    }

    public function getExtension()
    {
        return new ChoiceExtension();
    }

}