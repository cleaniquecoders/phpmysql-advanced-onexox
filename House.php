<?php

class House
{
    protected $color;

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getColor()
    {
        return $this->color;
    }
}

/**
 *
 */
class SemiD extends House
{
    public function setColor(array $colors)
    {
        $this->color = $colors;
    }

    public function getColor()
    {
        return join(', ', $this->color);
    }
}

$house = new House();
$house->setColor('red');
echo $house->getColor();

echo '<hr>';

$semid = new SemiD();
$semid->setColor(['white', 'red', 'green', 'blue']);
echo $semid->getColor();
