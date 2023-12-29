<?php
abstract class Shape{
    public $color;

    abstract public function getArea();

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function getColor(){
        return $this->color;
    }
}

class Circle extends Shape{

    public $radius;

    public function __construct($color, $radius)
    {
        parent::__construct($color);
        $this->radius = $radius;
    }

    public function getArea() {
        return $this->radius*$this->radius*3.14;
    }

}

class Rectangle extends Shape{

    public $height,$width;

    public function __construct($color, $height, $width)
    {
        parent::__construct($color);
        $this->height = $height;
        $this->width =$width;
    }
    public function getArea() {
        return $this->height*$this->width;
    }

}

$circularObj = new Circle("Green", 7);
echo "Color - ".$circularObj->getColor()." and ";
echo "Area - ".$circularObj->getArea();
echo "<br>-----------------------<br>";
$rectangularObj = new Rectangle("Blue", 5, 5);
echo "Color - ".$rectangularObj->getColor()." and ";
echo "Area - ".$rectangularObj->getArea();
echo "<br>-----------------------<br>";
?>