<?php
class A{
    protected function testA(){
        echo "TestA";
    }
}

class B extends A{
    public function testB(){
        echo "TestB";
        //Protected class cannot be directly accessed from the global scope. It should be called in the 
        // derived class and then that derived class can be called from the global scope.
        $this->testA();
    }
}

class C extends B{
    public function testC(){
        // echo "TestC";
        $this->testB();

    }
}

$obj = new C();
$obj->testC();

?>