<?php
include 'dbconnect.php';// connects db

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch form data
    $salutation = $_POST['salutation'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact_p = $_POST['contact_p'];
    $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $contact_m = $_POST['contact_m'];
    $dob = $_POST['dob'];
    $doj = $_POST['doj'];

    // Insert into database
    $sql = "INSERT INTO employees (salutation, name, age, gender, phone, password, email, dob, doj)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssissssss", $salutation, $name, $age, $gender, $contact_p, $pass, $contact_m, $dob, $doj);

        if ($stmt->execute()) {
            echo "Employee created successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    
// Handle Delete Request
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM employees WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Employee record deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting record: {$conn->error}');</script>";
    }
}

// Handle Update Request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    $id = $_POST['update_id'];
    $salutation = $_POST['salutation'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $doj = $_POST['doj'];

    $sql = "UPDATE employees SET 
                salutation = '$salutation', 
                name = '$name', 
                age = $age, 
                gender = '$gender', 
                phone = '$phone', 
                email = '$email', 
                dob = '$dob', 
                doj = '$doj' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Employee record updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating record: {$conn->error}');</script>";
    }
}

// Fetch all employees
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
}
$conn->close();
?>