<?php
for($x=0, $y=10; $x<=10 && $y>=0; $x++,$y--){
    echo "The number x is: $x & ";
    echo "The number y is: $y <br>";
}

$cars = array("BMW", "Audi", "Porsche");

foreach($cars as $a)
    echo $a."<br>";

for($x=0; $x<count($cars); $x++){
        echo $cars[$x]. " <br>";
}

echo "<br>------------------------------------------------ <br>";

// break statement
for($x=0; $x<5; $x++){
    if($x==3) break;
    echo "The number is: $x <br>";
}
echo "<br>------------------------------------------------ <br>";

//continue statement
for($x=0; $x<5; $x++){
    if($x==3) continue;
    echo "The number is: $x <br>";
}
?>

