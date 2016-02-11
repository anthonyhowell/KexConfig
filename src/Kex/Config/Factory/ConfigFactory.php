<?php

namespace Kex\Config\Factory;


/**
 * Class ConfigFactory
 * @package Kex\Config\Factory
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class ConfigFactory implements FactoryInterface
{

    private $extensions = array();
    private $sortedExtensions;

    public function __construct()
    {
        $this->addExtension(new CoreExtension());
        $this->addExtension(new ChoiceExtension());
    }

    public function addExtension(ExtensionInterface $extension)
    {
        $this->extensions[] = $extension;
    }

    public function getExtensions()
    {
//        if (null === $this->sortedExtensions) {
//            ksort($this->extensions);
//            $this->sortedExtensions = !empty($this->extensions)
//                ? call_user_func_array('array_merge', $this->extensions)
//                : array();
//        }

//        return $this->sortedExtensions;
        return $this->extensions;
    }

    public function createConfig($type, array $options = array())
    {
        /** @var \Kex\Config\Factory\ExtensionInterface $extension */
        foreach ($this->getExtensions() as $extension) {
            if ($extension->handles($type)) {
                $config = $extension->build($type, $options, $this);
                return $config;
            }
        }
    }

}