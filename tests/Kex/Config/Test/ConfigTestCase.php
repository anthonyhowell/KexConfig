<?php

namespace Kex\Config\Test;

use Kex\Config\Model\BooleanConfig;
use Kex\Config\Model\ConfigGroup;


abstract class ConfigTestCase extends \PHPUnit_Framework_TestCase
{

    const KEY   = 'key';
    const LABEL = 'label';


    /**
     * @return string
     */
    abstract public function getNewConfig();

    abstract public function testValue();

    public function testKey()
    {
        /** @var \Kex\Config\Model\ConfigInterface $config */
        $config = $this->getNewConfig();
        $config->setKey(self::KEY);
        $this->assertEquals(self::KEY, $config->getKey());
    }

    public function testLabel()
    {
        /** @var \Kex\Config\Model\ConfigInterface $config */
        $config = $this->getNewConfig();
        $config->setLabel(self::LABEL);
        $this->assertEquals(self::LABEL, $config->getLabel());
    }

    public function testGroup()
    {
        $group = new ConfigGroup(self::KEY, self::LABEL);

        /** @var \Kex\Config\Model\ConfigInterface $config */
        $config = $this->getNewConfig();
        $config->setGroup($group);

        $this->assertEquals(self::KEY, $config->getGroup()->getKey());
        $this->assertEquals(self::LABEL, $config->getGroup()->getLabel());
    }

}