<?php

namespace Config\Test\Factory;

use DateTime;
use Kex\Config\Factory\ConfigFactory;
use Kex\Config\Model\BooleanConfig;
use Kex\Config\Model\ConfigInterface;
use Kex\Config\Model\DateConfig;
use Kex\Config\Model\FloatConfig;
use Kex\Config\Model\IntegerConfig;
use Kex\Config\Model\StringConfig;
use Kex\Config\Model\TextConfig;
use PHPUnit_Framework_TestCase;


/**
 * Class FactoryTest
 * @package Config\Test\Factory
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class FactoryTest extends PHPUnit_Framework_TestCase
{

    const TEST_KEY = 'some_key';
    const TEST_LABEL = 'Some Label';


    public function testBooleanFactory()
    {
        $value = true;

        /** @var \Kex\Config\Model\ConfigInterface $config */
        $config = $this->factoryConfig('bool', $value);

        $this->assertTrue($config instanceof BooleanConfig);
        $this->runConfigPropertyTest($config, $value);

        /** @var \Kex\Config\Model\ConfigInterface $config */
        $config = $this->factoryConfig('boolean', $value);

        $this->assertTrue($config instanceof BooleanConfig);
        $this->runConfigPropertyTest($config, $value);
    }


    public function testDateFactory()
    {
        $value = new DateTime();

        /** @var \Kex\Config\Model\ConfigInterface $config */
        $config = $this->factoryConfig('date', $value);

        $this->assertTrue($config instanceof DateConfig);
        $this->runConfigPropertyTest($config, $value);
    }

    public function testFloatFactory()
    {
        $value = 5.1234;

        /** @var \Kex\Config\Model\ConfigInterface $config */
        $config = $this->factoryConfig('float', $value);

        $this->assertTrue($config instanceof FloatConfig);
        $this->runConfigPropertyTest($config, $value);
    }

    public function testIntegerFactory()
    {
        $value = 5;

        /** @var \Kex\Config\Model\ConfigInterface $config */
        $config = $this->factoryConfig('int', $value);

        $this->assertTrue($config instanceof IntegerConfig);
        $this->runConfigPropertyTest($config, $value);

        /** @var \Kex\Config\Model\ConfigInterface $config */
        $config = $this->factoryConfig('integer', $value);

        $this->assertTrue($config instanceof IntegerConfig);
        $this->runConfigPropertyTest($config, $value);
    }

    public function testStringFactory()
    {
        $value = 'this is a string';

        /** @var \Kex\Config\Model\ConfigInterface $config */
        $config = $this->factoryConfig('string', $value);

        $this->assertTrue($config instanceof StringConfig);
        $this->runConfigPropertyTest($config, $value);
    }

    public function testTextFactory()
    {
        $value = 'this is a string';

        /** @var \Kex\Config\Model\ConfigInterface $config */
        $config = $this->factoryConfig('text', $value);

        $this->assertTrue($config instanceof TextConfig);
        $this->runConfigPropertyTest($config, $value);
    }

    private function factoryConfig($type, $value)
    {
        $factory = new ConfigFactory();

        return $factory->createConfig($type, array(
            'key'   => self::TEST_KEY,
            'label' => self::TEST_LABEL,
            'value' => $value
        ));
    }

    private function runConfigPropertyTest(ConfigInterface $config, $value)
    {
        $this->assertEquals(self::TEST_KEY, $config->getKey());
        $this->assertEquals(self::TEST_LABEL, $config->getLabel());
        $this->assertEquals($value, $config->getValue());
    }

}