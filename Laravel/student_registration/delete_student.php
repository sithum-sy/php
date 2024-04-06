<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login-form.php");
    exit;
}

if (isset($_POST['id'])) {

    require_once "db_connection.php";

    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);   //i-integer
    $id = $_POST['id'];

    if ($stmt->execute()) {
        header("Location: home.php");
        exit;
    } else {
        header("Location: home.php?error=delete_failed");
        exit;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: home.php?error=id_not_set");
    exit;
}
