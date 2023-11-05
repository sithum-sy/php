<?php
require 'db.php';
$id = $_GET['id'];

//LOAD DATA
$sql = "SELECT * FROM contactus WHERE id='".$id."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);

if(isset($_POST['submit']) ){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $moblie = $_POST["mobile"];
    $msg = $_POST["msg"];

    $sql = "UPDATE contactus
            SET name = '".$name."', 
                email = '".$email."',
                mobile = '".$moblie."',  
                msg = '".$msg."'  
            WHERE id = '".$id."'   
    ";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header("location: viewData.php"); 
    
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
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
        <label>Name - </label><input type="text" name="name" value="<?php echo $row[1] ?>"> <br>
        <label>Email - </label><input type="text" name="email" value="<?php echo $row[2] ?>"><br>
        <label>Mobile - </label><input type="text" name="mobile" value="<?php echo $row[3] ?>"><br>
        <label>Message - </label><textarea type="text" name="msg" ><?php echo $row[4] ?></textarea><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>