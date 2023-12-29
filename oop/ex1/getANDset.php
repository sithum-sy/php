<?php
class Person1{
    public $name = "Sithum";
    public $phone = "123456";

    public function __get($proName)
    {
        if($proName == "username"){
            return $this->name;
        }
        return "Property name $proName does not exist";
    }

    public function __set($proName, $value)
    {
        if($proName == "username"){
            return $this->name = $value;
        }
    }
}

$obj = new Person1;
echo $obj->username;
$obj->username = " Yasiru";
echo $obj->username;

?>