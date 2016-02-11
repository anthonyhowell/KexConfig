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
class MultiChoiceConfigTest extends ConfigTestCase
{

    public function getNewConfig()
    {
        return new ChoiceConfig();
    }

    public function testValue()
    {
        $config = $this->getNewConfig();

        $optionOne = new BooleanConfig('opt_one', 'Opt One', true);
        $optionTwo = new BooleanConfig('opt_two', 'Opt Two', false);

        $config->addOption($optionOne);
        $config->addOption($optionTwo);

        $config->select($optionOne);
        $config->select($optionTwo);

        $selection = $config->getValue();

        $this->assertArrayHasKey($optionOne->getKey(), $selection);
        $this->assertArrayHasKey($optionTwo->getKey(), $selection);
    }

}