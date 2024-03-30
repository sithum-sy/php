<?php
require_once "db_connection.php";

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$password = $_POST['password'];
$verifyPassword = $_POST['verifyPassword'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$subject = $_POST['subject'];
$gender = $_POST['gender'];

if ($password != $verifyPassword) {
    echo "Error: Passwords do not match.";
    exit();
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO students (first_name, last_name, email, phone_number, password, address, date_of_birth, subject, gender)
            VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$passwordHash', '$address', '$dob', '$subject', '$gender')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
