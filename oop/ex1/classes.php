<?php
// class Fruit{
//     //Properties - Instance variables
//     public $name;
//     public $color;

//     //Methods
//     public function intro(){
//         //"this" keyword is used to capture instance variables
//         echo "Name - ".$this->name." | Color - ".$this->color;
//     }
// }

class Car{
    private $name;
    private $color;

    //Setters
    public function set_name($name){
        $this->name = $name;
    }
    public function set_color($color){
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

// echo "//Public access modifier<br>";
// $apple = new Fruit();
// $apple->name = "Apple";
// $apple->color = "Red";
// $apple->intro();
// echo "<br>-----------------------<br>";
// $grape = new Fruit();
// $grape->name = "Grape";
// $grape->color = "Purple";
// $grape->intro();
// echo "<br>-----------------------<br>";

echo "//Private access modifier<br>";
$bmw = new Car();
$bmw->set_name("BMW M5");
$bmw->set_color("Green");
echo $bmw->get_name();
echo $bmw->get_color();
echo "<br>-----------------------<br>";
var_dump($bmw instanceof Car);

?>