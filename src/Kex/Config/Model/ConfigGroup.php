<?php

namespace Kex\Config\Model;
use ArrayAccess;
use Countable;
use Iterator;
use JsonSerializable;
use Kex\Config\Exception\InvalidArgumentException;
use Kex\Config\Factory\FactoryInterface;
use Serializable;


/**
 * Class ConfigGroup
 * @package Kex\Config\Model
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class ConfigGroup implements Countable, Iterator, ArrayAccess, Serializable, JsonSerializable
{

    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var array
     */
    protected $config = [];

    /**
     * @var \Kex\Config\Factory\FactoryInterface
     */
    protected $factory;


    /**
     * ConfigGroup constructor.
     * @param string $key
     * @param string $label
     * @param FactoryInterface $factory
     */
    public function __construct($key, $label, FactoryInterface $factory)
    {
        $this->key = $key;
        $this->label = $label;
        $this->factory = $factory;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function add($config, array $options = [])
    {
        if (!$config instanceof ConfigInterface) {
            $config = $this->factory->createConfig($config, $options);
        }

        $this->config[$config->getKey()] = $config;

        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function hasConfig(ConfigInterface $config)
    {

    }

    /**
     * {@inheritdoc}
     * @see    Countable::count
     * @return int
     */
    public function count()
    {
        return count($this->config);
    }

    /**
     * {@inheritdoc}
     * @see Iterator::current
     */
    public function current()
    {
        return current($this->config);
    }

    public function next()
    {
        next($this->config);
    }

    /**
     * {@inheritdoc}
     * @see    Iterator::key
     * @return mixed
     */
    public function key()
    {
        return key($this->config);
    }

    /**
     * {@inheritdoc}
     * @see    Iterator::valid
     * @return bool
     */
    public function valid()
    {
        return ($this->key() !== null);
    }

    /**
     * {@inheritdoc}
     * @see Iterator::rewind
     */
    public function rewind()
    {
        rewind($this->config);
    }

    /**
     * {@inheritdoc}
     * @see    ArrayAccess::offsetExists
     * @param  mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return $this->__isset($offset);
    }

    /**
     * {@inheritdoc}
     * @see    ArrayAccess::offsetGet
     * @param  mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->__get($offset);
    }

    /**
     * {@inheritdoc}
     * @see   ArrayAccess::offsetSet
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        if (!$value instanceof ConfigInterface) {
            throw InvalidArgumentException::configRequired();
        }

        $this->__set($offset, $value);
    }

    /**
     * {@inheritdoc}
     * @see   ArrayAccess:offsetUnset
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        if (!$offset instanceof ConfigInterface) {
            throw InvalidArgumentException::configRequired();
        }

        $this->__unset($offset);
    }

    /**
     * isset() overloading
     *
     * @param $key
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->config[$key]);
    }

    public function __set($name, $value)
    {

    }

    public function __unset(ConfigInterface $config)
    {
        if (isset($this->config[$config->getKey()])) {
            unset($this->config[$config->getKey()]);
        }
    }

    public function serialize()
    {
        return $this->toArray();
    }

    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toArray()
    {
        $arrayConfig = array();

        foreach ($this->getConfig() as $config) {
            $arrayConfig[] = $config->toArray();
        }

        return [
            'key'    => $this->getKey(),
            'label'  => $this->getLabel(),
            'config' => $arrayConfig
        ];
    }

}