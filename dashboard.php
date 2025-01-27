<?php
include "nav_dash.php"; 
include "backend_dash.php";
?>  


<!DOCTYPE html>     
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB| </title>   

    <!-- ------------------------------------------------------------------------------------------------------------------ -->
    <!--BOOTSTRAP CDN for CSS -->
    <!-- ------------------------------------------------------------------------------------------------------------------ -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- ------------------------------------------------------------------------------------------------------------------ -->
    <!-- Bootstrap Icons -->
    <!-- ------------------------------------------------------------------------------------------------------------------ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

   

</head>
<body>
<!-- Vertical Navbar -->
<div class="d-flex flex-column bg-dark text-light m-1" style="width: 200px; height: 100vh; padding: 20px; border-right: 1px solid #ddd;">
   <h4 class="text-center text-danger m-1">Actions</h4>
   <hr class="bg-light">
  
        <!-- Action Links -->
        <a href="#" class="text-light text-decoration-none mb-2"><i class="bi bi-person-circle"></i>  Profile</a><br>

        <a href="" class="text-light text-decoration-none mb-2" data-bs-toggle="modal" data-bs-target="#createEmployeeModal"><i class="bi bi-person-plus"></i>  Create Employee</a><br>

        <!-- <a href="#" class="text-light text-decoration-none" data-bs-toggle="collapse" data-bs-target="#viewTable"><i class="bi bi-journals"></i> View Records</a> -->
       
        <a href="view.php" class="text-light text-decoration-none d-block"><i class="bi bi-journals"></i> View Records</a>
</div>

<!-- Modal for Creating Employee -->
<div class="modal fade" id="createEmployeeModal" tabindex="-1" aria-labelledby="createEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"> 
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="createEmployeeModalLabel">Create Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> 
            <!-- Modal Body -->
            <div class="modal-body">
                <form id="employee-form">
                    <div class="mb-3">
                        <label for="salutation" class="form-label">Salutation</label>
                        <select class="form-select" name="salutation" id="salutation" required>
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Ms.">Ms.</option>
                            <option value="Baby">Baby</option>
                            <option value="Master">Master</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" name="age" id="age" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" id="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="contact_p" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" name="contact_p" id="contact_p" required>
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" class="form-control" name="pass" id="pass" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact_m" class="form-label">Email</label>
                        <input type="email" class="form-control" name="contact_m" id="contact_m" required>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" id="dob" required>
                    </div>
                    <div class="mb-3">
                        <label for="doj" class="form-label">Date of Joining</label>
                        <input type="date" class="form-control" name="doj" id="doj" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Create Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


 <script>
    // Submit form via AJAX
    document.getElementById('employee-form').addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('backend_dash.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Show the server response
            this.reset(); // Reset the form
            const modal = bootstrap.Modal.getInstance(document.getElementById('createEmployeeModal'));
            modal.hide(); // Hide the modal
        })
        .catch(error => console.error('Error:', error));
    });



</script>
<?php
 include "footer.php";
 ?>

<body>