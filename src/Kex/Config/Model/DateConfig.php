<?php

namespace Kex\Config\Model;

use DateTime;


/**
 * Class DateConfig
 * @package Kex\Config\Model
 *
 * @author Anthony Howell <anthonyhowell@gmail.com>
 */
class DateConfig extends AbstractConfig
{

    /**
     * {@inheritDoc}
     * @param $value
     * @return $this|DateConfig
     */
    public function setValue($value)
    {
        return $this->setDate($value);
    }

    /**
     * @param DateTime $date
     * @return $this
     */
    public function setDate(DateTime $date)
    {
        $this->value = $date;
        return $this;
    }

    /**
     * {@inheritdoc}
     * @return array
     */
    public function toArray()
    {
        return [
            'type'  => 'date',
            'key'   => $this->getkey(),
            'label' => $this->getLabel(),
            'value' => $this->getValue()->format('U')
        ];
    }

}