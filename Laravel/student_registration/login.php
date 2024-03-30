<?php
    require_once "db_connection.php";

    session_start();

    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    $sql = "SELECT * FROM students WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $row['id'];
            header("Location: home.php");
            exit();
        } else {
            echo "Incorrect email or password";
        }
    } else {
        echo "Incorrect email or password";
    }

    $stmt->close();
    $conn->close();
?>
