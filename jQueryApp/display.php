<?php
require 'db.php';

if (isset($_POST['displaysend'])) {

    $table = '<table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact No</th>
                        <th scope="col" colspan="2">Operations</th>
                    </tr>
                </thead>';

    $sql = "SELECT * FROM userdata";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $table .= '
                    <tr>
                        <td>' . $row['Id'] . '</td>
                        <td>' . $row['FirstName'] . '</td>
                        <td>' . $row['LastName'] . '</td>
                        <td>' . $row['Email'] . '</td>
                        <td>' . $row['Mobile'] . '</td>
                        <td><button type="button" class="btn btn-primary" onclick="">Edit</button></td>
                        <td><button type="button" class="btn btn-danger" onclick="">Delete</button></td>
                    </tr>';
    }

    $table .= '</table>';
    echo $table;
}
