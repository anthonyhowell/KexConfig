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
    abstract public function getNewConfig();

    abstract public function testValue();

    public function testKey()
    {
        /** @var \Pax\Config\Model\ConfigInterface $config */
        $config = $this->getNewConfig();
        $config->setKey(self::KEY);
        $this->assertEquals(self::KEY, $config->getKey());
    }

    public function testLabel()
    {
        /** @var \Pax\Config\Model\ConfigInterface $config */
        $config = $this->getNewConfig();
        $config->setLabel(self::LABEL);
        $this->assertEquals(self::LABEL, $config->getLabel());
    }

    public function testGroup()
    {
        $group = new ConfigGroup(self::KEY, self::LABEL);

        /** @var \Pax\Config\Model\ConfigInterface $config */
        $config = $this->getNewConfig();
        $config->setGroup($group);

        $this->assertEquals(self::KEY, $config->getGroup()->getKey());
        $this->assertEquals(self::LABEL, $config->getGroup()->getLabel());
    }

}