<?php

namespace Config\Test\Factory;

use DateTime;
use Kex\Config\Factory\ConfigFactory;
use Kex\Config\Factory\CoreExtension;
use PHPUnit_Framework_TestCase;


/**
 * Class CoreExtensionTest
 * @package Config\Test\Factory
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class CoreExtensionTest extends PHPUnit_Framework_TestCase
{

    public function testBuildOptions()
    {
        $extension = $this->getExtension();

        $options = $extension->buildOptions(array());

        $this->assertArrayHasKey('key',   $options);
        $this->assertArrayHasKey('label', $options);
        $this->assertArrayHasKey('value', $options);
    }

    private function runConfigTest($type, $value)
    {
        /** @var \Kex\Config\Model\ConfigInterface $config */
        $config = $this->createConfig($type, array('value' => $value));

        $this->assertEquals(null,   $config->getKey());
        $this->assertEquals(null,   $config->getLabel());
        $this->assertEquals($value, $config->getValue());
    }

    public function testBooleanConfig()
    {
        $this->runConfigTest('boolean', true);
    }

    public function testDateConfig()
    {
        $this->runConfigTest('date', new DateTime());
    }

    public function testFloatConfig()
    {
        $this->runConfigTest('float', 5.123);
    }

    public function testIntegerConfig()
    {
        $this->runConfigTest('integer', 5);
    }

    public function testStringConfig()
    {
        $this->runConfigTest('string', 'value');
    }

    public function testTextConfig()
    {
        $this->runConfigTest('text', 'value');
    }

    public function getExtension()
    {
        return new CoreExtension();
    }

    public function createConfig($type, array $options)
    {
        $factory = new ConfigFactory();
        return $factory->createConfig($type, $options);
    }

}