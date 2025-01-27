<?php
session_start();
include 'dbconnect.php'; // Include database configuration

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Query to fetch the user
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Compare the plain-text passwords
        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];

            echo "<script>alert('Login successful!');</script>";
            echo "<script>window.location.href = 'dashboard.php';</script>"; // Redirect to a home page or dashboard
        } else {
            echo "<script>alert('Incorrect password!');</script>";
        }
    } else {
        echo "<script>alert('No account found with this email!');</script>";
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- ------------------------------------------------------------------------------------------------------------------ -->

    <!--BOOTSTRAP CDN for CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- ------------------------------------------------------------------------------------------------------------------ -->
</head>
<?php
include 'nav.php';
?>

<body>

    <div class="container d-flex flex-column justify-content-center align-items-center my-5 py-5 border shadow-lg"
        style="max-width: 450px; width: 100%;">
        <!-- Header -->
        <h4 class="display-6 text-center mb-4" style="">LOGIN </h4>
        <hr class="w-100 mb-4">


        <!-- <form method='POST' class="w-50">
        <div class="row mb-3">
          <div class="col">
                <input type="text" class="form-control" name="uname" id="uname" placeholder="User Name / E-mail ID" aria-label="First name" required>
          </div>
        </div>-->
        <!-- Password -->
        <!--<div class="mb-3">
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" aria-label="Password" required>
        </div> -->


        <form method="POST" class="w-75">
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email Address" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <center>
                <button type="submit" class="btn btn-outline-success w-20">Login</button>
                <a href="signup.php" class="btn btn-outline-primary w-20">Create Account</a>
            </center>
        </form>

        <!-- <center>
            <button type="submit" class="btn btn-outline-success">Submit</button>
            <button type="submit" class="btn btn-outline-danger w-20">Cancel</button>
        <center>
    </form> -->
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

</body>

</html>