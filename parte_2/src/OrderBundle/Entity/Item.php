<?php

namespace OrderBundle\Entity;

class Item
{
    private $name;
    private $restaurant;
    private $available;
    private $value;

    public function __construct(
        $name,
        $available,
        $value,
        Restaurant $restaurant
    )
    {
        $this->name = $name;
        $this->restaurant = $restaurant;
        $this->available = $available;
        $this->value = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setName($name)
    {
        return $this->name = $name;
    }

    public function setValue($value)
    {
        return $this->value = $value;
    }

    public function setIsAvailable($isAvailable)
    {
        return $this->available = $isAvailable;
    }

    public function isAvailable()
    {
        return $this->restaurant->isOpen() && $this->available;
    }
}