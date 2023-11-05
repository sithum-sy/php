<?php
require 'db.php';

$sql = "SELECT * FROM contactus";
$result = mysqli_query($conn, $sql);

if(isset($_POST['submit']) ){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $moblie = $_POST["mobile"];
    $msg = $_POST["msg"];

    $sql = "INSERT INTO contactus (name, email, mobile, msg)
    VALUES ('".$name."', '".$email."', '".$moblie."', '".$msg."')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully \n";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  
  mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label>Name - </label><input type="text" name="name"> <br>
        <label>Email - </label><input type="text" name="email"><br>
        <label>Mobile - </label><input type="text" name="mobile"><br>
        <label>Message - </label><textarea type="text" name="msg"></textarea><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>
