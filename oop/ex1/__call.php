<?php
class Person1{
    private $name = "Sithum";

    public function __call($name, $arguments)
    {
        if($name == "getPersonName"){
            return $this->getName();
        }
        return "Method name $name does not exist.";
    }

    private function getName(){
        return $this->name;
    }
}

$obj = new Person1;
echo $obj->getPersonName();
?>