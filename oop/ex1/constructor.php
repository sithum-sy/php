<?php
// A constructor allows you to initialize an object's properties upon creation of the object.
// If you create a __construct() function, PHP will automatically call this function when you 
// create an object from a class.

class Car{
    private $name;
    private $color;

   function __construct($name,$color)
   {
    $this->name = $name;
    $this->color = $color;
   }

    //Getters
    public function get_name(){
       return $this->name;
    }
    public function get_color(){
        return $this->color;
    }

}

$bmw = new Car("BMW", "Black");
echo "Name - ".$bmw->get_name()." | Color - ".$bmw->get_color();

?>