<?php
if(isset($_POST["name"]) ){
    
    // $name = $_POST["name"];
    // $email = $_POST["email"];
    // $moblie = $_POST["mobile"];
    // $msg = $_POST["msg"];

    // echo " ".$name." ".$email." ".$moblie." ".$msg." ";
    print_r($_POST);
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
        <label>Name - </label><input type="text" name="name" required> <br>
        <label>Email - </label><input type="text" name="email"><br>
        <label>Mobile - </label><input type="text" name="mobile"><br>
        <label>Message - </label><textarea type="text" name="msg"></textarea><br>
        <input type="submit">
    </form>
</body>
</html>
