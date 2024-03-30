<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Welcome to the Homepage</h2>
        <p>This is the homepage content that can only be accessed after login.</p>
        <p><a href="logout.php" class="btn btn-warning">Logout</a></p>

        <?php
            session_start();

            if(!isset($_SESSION['email'])) {
                header("Location: login-form.php");
                exit;
            }

            require_once "db_connection.php";

            $sql = "SELECT * FROM students";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h2>Student Details</h2>";
                echo "<table class='table'>";
                echo "<thead class='table-dark'>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>First Name</th>";
                echo "<th>Last Name</th>";
                echo "<th>Email</th>";
                echo "<th>Phone Number</th>";
                echo "<th>Address</th>";
                echo "<th>Date of Birth</th>";
                echo "<th>Subject</th>";
                echo "<th>Actions</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone_number"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["date_of_birth"] . "</td>";
                    echo "<td>" . $row["subject"] . "</td>";
                    echo "<td>";

                    echo "<a href='edit-form.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a>"; // Edit button
                    
                    echo "<form method='post' action='delete_student.php' style='display: inline-block; margin-left: 5px;'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this student?\")'>Delete</button>"; // Delete button
                    echo "</form>";

                    
                    echo "</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "No students found";
            }

            $conn->close();
        ?>
    </div>
</body>
</html>
