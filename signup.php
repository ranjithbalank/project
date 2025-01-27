<?php
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $conn->real_escape_string($_POST['first_name']);
    $lastName = $conn->real_escape_string($_POST['last_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        // Hash the password
        // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert user into database
        $sql = "INSERT INTO users (first_name, last_name, email, password) 
                VALUES ('$firstName', '$lastName', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Account created successfully!');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
        } else {
            if ($conn->errno === 1062) { // Duplicate entry error
                echo "<script>alert('Email already exists!');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account</title>

    <!--BOOTSTRAP CDN for CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<?php
include 'nav.php';
?>
<body>
<div class="container d-flex flex-column justify-content-center align-items-center my-5 py-5 border shadow-lg" style="max-width: 900px; width: 100%;">
    <h4 class="display-6 text-center mb-4">CREATE ACCOUNT</h4>
    <hr class="w-100 mb-4">

    <form method="POST" class="w-50">
        <div class="row mb-3">
            <div class="col">
                <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
            </div>
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
        </div>
        <center>
            <button type="submit" class="btn btn-outline-success w-20">Create Account</button>
            <a href="login.php" class="btn btn-outline-danger w-20">Cancel</a>
        </center>
    </form>
</div>
<?php
include 'footer.php';
?>
            
            
    <!------------------------------------------------------------------------------------------------------------------ -->

    <!--BOOTSTRAP CDN for JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- --------------------------------------------------------------------------------------------------------------------- -->
    <!-- script for saving in DB USING AJAX JQUERY -->

</body>
</html>
