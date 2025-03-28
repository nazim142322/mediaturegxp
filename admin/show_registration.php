<?php
// Database connection
$servername = "localhost";
$username = "mediat_mediture";
$password = "UuZyATavTfRgJksJ4QbA";
$dbname = "mediat_mediture";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch all data from the user_data table
$sql = "SELECT * FROM user_data ORDER BY created_at DESC"; // You can adjust the order if needed
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin-Mediature GxP Solutions Pvt. Ltd.</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
    <link rel="stylesheet" href="./assets/css/styles.min.css" />
    <link rel="stylesheet" href="./assets/css/styles.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Table</title>
  <style>
        body {
            font-family: Arial, sans-serif;
            
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .table-container {
            width: 100%;
            overflow: auto; /* Enable scrolling */
            margin: 20px 0;
                margin-top: 96px;
        }
        .container {
            width: 100%;
            overflow: auto; /* Enable scrolling */
            margin: 20px 0;
                margin-top: 96px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #444;
            white-space: nowrap; /* Prevent content from breaking into multiple lines */
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #333;
        }

        tr:nth-child(odd) {
            background-color: #444;
        }

        tr:hover {
            background-color: #555;
        }

        /* Optional: Styling for table container to add scrollbars */
        .table {
            max-height: 500px; /* Adjust the height as needed */
            overflow-y: scroll; /* Vertical scrollbar */
            overflow-x: auto; /* Horizontal scrollbar */
        }

@media (max-width: 768px) {
    .table {
        max-height: 500px; /* Adjust the height as needed */
        overflow-y: scroll; /* Vertical scrollbar */
        overflow-x: auto; /* Horizontal scrollbar */
    }
    .container {
    width: 100%;
    overflow: auto;
    margin: 20px 0;
    margin-top: 96px;
}

}
        .table-striped {
            width: 100%;
            color: #f2f2f2;
          
        }

        .table-striped td, .table-striped th {
            border: 1px solid #444;
        }

        .table-striped th {
            background-color: #333;
        }

        .table-striped tr:nth-child(odd) {
            background-color: #444;
        }

        .table-striped tr:nth-child(even) {
            background-color: #333;
        }

        .table-striped tr:hover {
            background-color: #555;
        }
        .adminheaderlogo {
            width: 100px;
            height: 100px;
        }
        .alpha{
    display: flex;
}

    </style>



   <style>
        .adminheaderlogo {
            width: 100px;
            height: 100px;
        }

        .form-container {
            background: #fff;
            width: 90%;
            max-width: 1200px;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }


        /* Custom styles for table */
        .table th,
        .table td {
            text-align: center;
            /* Center align text for better readability */
        }

        .table th {
            background-color: #343a40;
            /* Dark background for table header */
            color: #ffffff;
            /* White text for table header */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: auto;
                /* Allow horizontal scrolling on small screens */
            }
        }

        /* Additional styles for buttons */
        .btn {
            margin: 0 5px;
            /* Add margin between buttons */
        }
    </style>

</head>
<body  style="color: white;">

<!--  Body Wrapper -->
    <div class="page-wrapper alpha" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
  <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="./assets/images/MEDIATURE LOGO.png" class="adminheaderlogo" alt="" />
                    </a>
                   <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <span>
                        ❌  </span>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./index.html" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link" href="admin_panel.php" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Users</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="paymentpanel.php" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Payments</span>
                            </a>
                        </li> -->

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="userpayment.php" aria-expanded="false">
                                <span>
                                    <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                                </span>
                                <span class="hide-menu">Users Payments</span>
                            </a>
                        </li>
                         <li class="sidebar-item">
              <a class="sidebar-link" href="show_registration.php" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:danger-circle-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Users Data</span>
              </a>
            </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
</aside>

    <div class=" body-wrapper">
    <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>

                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="./assets/images/MEDIATURE LOGO.png" alt="" width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>

                                        <a href="logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
    <div class="container">
        <?php
        // Check if there are any results
        if ($result->num_rows > 0) {
            echo "<table class='table table-striped'>";
            echo "<thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Qualification</th>
                        <th>Institute</th>
                        <th>Experience</th>
                        <th>Interest</th>
                        <th>Course</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Payment ID</th>
                        <th>Payment Status</th>
                        <th>Created At</th>
                    </tr>
                  </thead>
                  <tbody>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['fullname'] . "</td>
                        <td>" . $row['qualification'] . "</td>
                        <td>" . $row['institute'] . "</td>
                        <td>" . $row['experience'] . "</td>
                        <td>" . $row['interest'] . "</td>
                        <td>" . $row['course'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['phone'] . "</td>
                        <td>" . $row['address'] . "</td>
                        <td>" . $row['payment_id'] . "</td>
                        <td>" . $row['payment_status'] . "</td>
                        <td>" . $row['created_at'] . "</td>
                      </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "No records found.";
        }

        // Close the connection
        $conn->close();
        ?>
    </div>
</div>



        <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
        <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
        <script src="./assets/js/sidebarmenu.js"></script>
        <script src="./assets/js/app.min.js"></script>
        <script src="./assets/js/dashboard.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
</html>
