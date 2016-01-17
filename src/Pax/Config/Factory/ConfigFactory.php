<?php

namespace Pax\Config\Factory;
use Pax\Config\Factory\Extension\CoreExtension;
use Pax\Config\Factory\Extension\ExtensionInterface;


/**
 * Class ConfigFactory
 * @package Pax\Config\Factory
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class ConfigFactory
{

    /** @var array */
    private $extensions = array();

    /**
     * @var ExtensionInterface
     */
    private $sorted;


    public function __construct()
    {
        $this->addExtension(new CoreExtension(), -10);
    }

    public function create($type, array $options)
    {
        /** @var \Pax\Config\Factory\Extension $extension */
        foreach ($this->getExtensions() as $extension) {
            $options = $extension->buildOptions($options);
        }



    }

    public function addExtension(ExtensionInterface $extension, $priority = 0)
    {
        $this->extensions[$priority][] = $extension;
        $this->sorted = null;
    }

    private function getExtensions()
    {
        if (null == $this->sorted) {
            krsort($this->extensions);
            $this->sorted = !empty($this->extensions)
                ? call_user_func_array('array_merge', $this->extensions)
                : array();
        }

        return $this->sorted;
    }

}