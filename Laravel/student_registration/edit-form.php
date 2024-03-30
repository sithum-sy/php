<?php
    session_start();

    if(!isset($_SESSION['email'])) {
        header("Location: login-form.php");
        exit;
    }

    require_once "db_connection.php";

    if(isset($_GET['id'])) {
        $student_id = $_GET['id'];

        $sql = "SELECT * FROM students WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $student = $result->fetch_assoc();
        } else {
            header("Location: home.php");
            exit;
        }

        $stmt->close();
    } else {
        header("Location: home.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $date_of_birth = $_POST['date_of_birth'];
        $subject = $_POST['subject'];

        $sql = "UPDATE students SET first_name=?, last_name=?, email=?, phone_number=?, address=?, date_of_birth=?, subject=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssi", $first_name, $last_name, $email, $phone_number, $address, $date_of_birth, $subject, $student_id);
        $stmt->execute();

        header("Location: home.php");
        exit;
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Student</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $student_id; ?>" method="POST">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $student['first_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $student['last_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $student['email']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $student['phone_number']; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $student['address']; ?>" required>
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $student['date_of_birth']; ?>" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <select class="form-control" id="subject" name="subject" required>
                    <option value="Maths" <?php if($student['subject'] == 'Maths') echo 'selected'; ?>>Maths</option>
                    <option value="Science" <?php if($student['subject'] == 'Science') echo 'selected'; ?>>Science</option>
                    <option value="English" <?php if($student['subject'] == 'English') echo 'selected'; ?>>English</option>
                    <option value="History" <?php if($student['subject'] == 'History') echo 'selected'; ?>>History</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </form>
    </div>
</body>
</html>
