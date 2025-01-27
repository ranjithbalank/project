<?php

    include "dbconnect.php"; // Ensure database connection is established
    session_start(); // Start session at the top of the file

    

    // Example login validation (replace this with actual logic if needed)
    if (isset($login_successful) && $login_successful) {
        $_SESSION['user_name'] = $username; // Use a consistent session key
        header('Location: home.php'); // Redirect to home page
        exit();
    } elseif (isset($login_successful) && !$login_successful) {
        echo "Login failed!";
    }


    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <!--BOOTSTRAP CDN for CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> 

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
      <div class="container-fluid">
        <!-- Logo on the left -->
        <a class="navbar-brand" href="dashboard.php">
          <img
            src="asset/logos.png"
            alt="Logo"
            width="50"
            height="30"
            class="d-inline-block align-text-top"
          />
          XYZ Pvt Ltd.
        </a>
        <!-- Toggle button for mobile view -->
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar items -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <!-- User Profile dropdown on the right -->
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
              <i class="bi bi-person-bounding-box" style="font-size;"></i> 
                <?php
                            // Display username or an empty string if not logged in
                            echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : '';
                        ?>
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdown"
              >
                
                <li><a class="dropdown-item" href="logout.php"><i class="bi bi-door-closed-fill"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Bootstrap 5 JS (including Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  </body>
</html>
