<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container mt-5">
        <h2>Student Registration Form</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" class="form-control" id="dob" name="dob">
            </div>

            <div class="form-group">
                <label for="subject">Subject:</label>
                <select name="subject" id="subject" class="form-control" required>
                    <option value="Maths">Maths</option>
                    <option value="Science">Science</option>
                    <option value="English">English</option>
                    <option value="History">History</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label><br>
                <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                <label for="male">
                    Male
                </label>
                <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                <label for="female">
                    Female
                </label>
                <input class="form-check-input" type="radio" name="gender" id="other" value="Other">
                <label for="other">
                    Other
                </label>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="verifyPassword">Verify Password:</label>
                <input type="password" class="form-control" id="verifyPassword" name="verifyPassword" required>
            </div>
            <button type="submit" class="btn btn-primary mt-5">Register</button>
        </form>
    </div>


</body>

</html>