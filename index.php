<?php

// define class
class Car
{
    private $color; // define the class property
    public $name;

    // define the method
    public function getColor()
    {
        echo $this->color;
    }

    public function setColor($value)
    {
        $this->color = $value;
        return $this;
    }

    // define the method
    public function getName()
    {
        echo $this->name;
    }

    public function setName($value)
    {
        $this->name = $value;
        return $this;
    }
}

$myCar = new Car(); // create a new Car Object
$myCar->setColor('red')->getColor();

// $myCar->color = 'red';
// $myCar->setColor('red');
// echo $myCar->color;
// $myCar->getColor();
// $myCar->setName('Savvy');
// $myCar->setColor('black');
// $myCar->getColor();
// $myCar->getName();
