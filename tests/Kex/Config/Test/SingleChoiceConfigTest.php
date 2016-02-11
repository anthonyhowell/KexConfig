<?php

namespace Kex\Config\Test;

use Kex\Config\Model\BooleanConfig;
use Kex\Config\Model\ChoiceConfig;
use Kex\Config\Model\DateConfig;


/**
 * Class SingleChoiceConfigTest
 * @package Kex\Config\Test
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class SingleChoiceConfigTest extends ConfigTestCase
{

    public function getNewConfig()
    {
        return new ChoiceConfig();
    }

    public function testValue()
    {
        $config = $this->getNewConfig();
        $config->setLimit(1);

        $optionOne = new BooleanConfig('opt_one', 'Opt One', true);
        $optionTwo = new BooleanConfig('opt_two', 'Opt Two', false);

        $config->addOption($optionOne);
        $config->addOption($optionTwo);

        $config->select($optionTwo);

        $this->assertEquals($optionTwo, $config->getValue());
    }

}