<?php
interface MyInterface{
    public function getName();
}

interface MyInterface1{
    public function getAge();
}

interface SubInterface extends MyInterface, MyInterface1{
    public function getPhone();
}

class MyClass implements SubInterface{
    public function getName(){
        echo "Test Name";
    }
    public function getAge(){
        echo "Test Age";
    }
    public function getPhone(){
        echo "Phone : 11111";
    }
}

$obj = new MyClass;
$obj->getName();
echo "<br>-----------------------<br>";

$obj->getAge();
echo "<br>-----------------------<br>";

$obj->getPhone();
?>