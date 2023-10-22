<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Arrays</h1>

    <?php 

//Indexed Arrays
$cars = array("BMW", "Porsche","Audi", "Tesla");

array_push($cars, "Ford", "Chevrolet");

$arrLength = count($cars);

for($x=0; $x<$arrLength; $x++){
    echo "My cars =  $cars[$x] |\n";
}

echo "<br>------------------------------------------------ <br>";

?>
</body>
</html>