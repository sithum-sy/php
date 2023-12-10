<?php

class Car{
    public $name;
    public $color;

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

    public function intro() {
        echo "The car is {$this->name} and the color is {$this->color}.";
      }

}

// BMW is inherited from Car
class BMW extends Car {
    public function message() {
      echo "Am I a race car or a suv? ";
    }
}

$bmw = new BMW("BMW M4CS", "Black");
echo "Name - ".$bmw->get_name()." | Color - ".$bmw->get_color()."<br>";
$bmw->message();

?>