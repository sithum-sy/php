<?php
class Person1{
    private $name = "Sithum";

    public function __call($name, $arguments)
    {
        if($name == "getPersonName"){
            return $this->getName();
        }else if($name == "setPersonName"){
            return $this->setName($arguments[0]);
        }
        return "Method name $name does not exist.";
    }

    private function getName(){
        return $this->name;
    }
    private function setName($name){
        return $this->name = $name;
    }
}

$obj = new Person1;
echo $obj->getPersonName();
$obj->setPersonName(" Yasiru");
echo $obj->getPersonName();
?>