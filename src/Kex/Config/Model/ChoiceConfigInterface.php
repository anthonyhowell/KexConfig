<?php

namespace Kex\Config\Model;


interface ChoiceConfigInterface extends ConfigInterface
{

    /**
     * @param ConfigInterface $config
     * @return ConfigInterface
     */
    public function addOption(ConfigInterface $config);

    /**
     * @param ConfigInterface $config
     * @return ConfigInterface
     */
    public function removeOption(ConfigInterface $config);

    /**
     * @param ConfigInterface $config
     * @return boolean
     */
    public function hasOption(ConfigInterface $config);

    /**
     * @return mixed
     */
    public function getOptions();

    /**
     * @param ConfigInterface $config
     * @return ConfigInterface
     */
    public function allowsSelection(ConfigInterface $config);

    /**
     * @param ConfigInterface $config
     * @return ConfigInterface
     */
    public function select(ConfigInterface $config);

    /**
     * @param ConfigInterface $config
     * @return ConfigInterface
     */
    public function unSelect(ConfigInterface $config);

    /**
     * @return array
     */
    public function getSelection();

    /**
     * @return int
     */
    public function getLimit();

}