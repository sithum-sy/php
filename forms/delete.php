<?php
require 'db.php';

$id = $_GET['id'];


// sql to delete a record
$sql = "DELETE FROM contactus WHERE id = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: viewData.php'); 
    exit;
} else {
    echo "Error deleting record";
}
?>