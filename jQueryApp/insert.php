<?php
require_once 'db.php';

extract($_POST);

if (isset($_POST['fNameSend']) && isset($_POST['lNameSend']) && isset($_POST['emailfNameSend']) && isset($_POST['mobileSend'])) {
    $sql = "INSERT INTO userdata(FirstName, LastName, Email, Mobile
            VALUES('" . $fNameSend . "', '" . $lNameSend . "', '" . $emailSend . "', '" . $mobileSend . "')";

    $result = mysqli_query($conn, $sql);
}
