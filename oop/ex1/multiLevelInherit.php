<?php
class A{
    public function testA(){
        echo "TestA";
    }
}

class B extends A{
    public function testB(){
        echo "TestB";
    }
}

class C extends B{
    public function testC(){
        echo "TestC";
    }
}

$obj = new C();
$obj->testB();

?>