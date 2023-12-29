<?php
class Person{
    public $name = "Sithum";

    public function __toString()
    {
        return "Name : ".$this->name;
    }
}

$obj = new Person;
echo $obj;
?>