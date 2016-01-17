<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 1/16/16
 * Time: 11:48 PM
 */

namespace Pax\Config\Test;


use Pax\Config\Model\BooleanConfig;
use Pax\Config\Model\ConfigGroup;

abstract class ConfigTestCase extends \PHPUnit_Framework_TestCase
{

    const KEY   = 'key';
    const LABEL = 'label';


    /**
     * @return string
     */
    abstract public function getConfigTypeClass();

    abstract public function testValue();

    public function testKey()
    {
        $configType = $this->getConfigTypeClass();

        /** @var \Pax\Config\Model\ConfigInterface $config */
        $config = new $configType();
        $config->setKey(self::KEY);
        $this->assertEquals(self::KEY, $config->getKey());
    }

    public function testLabel()
    {
        $configType = $this->getConfigTypeClass();

        /** @var \Pax\Config\Model\ConfigInterface $config */
        $config = new $configType();
        $config->setLabel(self::LABEL);
        $this->assertEquals(self::LABEL, $config->getLabel());
    }

    public function testGroup()
    {
        $configType = $this->getConfigTypeClass();

        $group = new ConfigGroup(self::KEY, self::LABEL);

        /** @var \Pax\Config\Model\ConfigInterface $config */
        $config = new $configType();
        $config->setGroup($group);

        $this->assertEquals(self::KEY, $config->getGroup()->getKey());
        $this->assertEquals(self::LABEL, $config->getGroup()->getLabel());
    }

}