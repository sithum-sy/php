<?php
require 'db.php';

$sql = "SELECT * FROM contactus";
$result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//   // output data of each row
//   while($row = mysqli_fetch_assoc($result)) {
//     echo "id: " . $row["id"]. " / Name: " . $row["name"]. " / Email: " . $row["email"]. " / Mobile: " . $row["mobile"]. " " .
//      " / Message: " . $row["msg"]. " " . "<br>";
//   }
// } else {
//   echo "0 results";
// }

// sql to delete a record
// $sql = "DELETE FROM MyGuests WHERE id=3";

// if (mysqli_query($conn, $sql)) {
//   echo "Record deleted successfully";
// } else {
//   echo "Error deleting record: " . mysqli_error($conn);
// }

if(isset($_POST['delete']) ){
    $sql = "DELETE FROM contactus WHERE id='$id";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: green;
            font-size: xx-large;
        }
 
        td {
            /* background-color: #E4F5D4; */
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
</head>
<body>
    <h1>Table View</h1>
<table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Message</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php 
                // LOOP TILL END OF DATA
                while($row = mysqli_fetch_assoc($result)) {
                   
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['mobile'];?></td>
                <td><?php echo $row['msg'];?></td>
                <td><button>Edit</button></td>
                <td><a href='delete.php?id=".$row['id']."'>Delete</a> </td>
            </tr>
            <?php
                }
            ?>
        </table>
</body>
</html>