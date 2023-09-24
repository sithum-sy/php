<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php functions</title>
</head>
<body>
    <h1>Functions in php</h1>

<?php
//functions in php
function writeMsg(){
    echo "Hello World!!!";
}

writeMsg();
echo "<br>------------------------------------------------ <br>";


function fullName($fName, $lName){ //first two params will be passed, rest is ignored
    echo "My name is $fName $lName";
}

fullName("Sithum", "Yasiru", "Jayasuriya");//eventhough only two parameters were passed in the function, this gives no error.

echo "<br>------------------------------------------------ <br>";

function multiply($x, $y, $z=5){
    return $x*$y*$z;
}

echo multiply(2,4);//answer=40 - default param is applied 
echo "<br>------------------------------------------------ <br>";

echo multiply(2,4,10);//answer=80 - default param is overridden



?>

</body>
</html>
