<?php
// Connect to the database
$conn = new mysqli('localhost', 'mediat_mediture', 'UuZyATavTfRgJksJ4QbA', 'mediat_mediture');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all registrations
$sql = "SELECT * FROM registrations";
$result = $conn->query($sql);

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin-Mediature GxP Solutions Pvt. Ltd.</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/seodashlogo.png" />
    <link rel="stylesheet" href="./assets/css/styles.min.css" />
    <link rel="stylesheet" href="./assets/css/styles.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>



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

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="./assets/images/MEDIATURE LOGO.png" class="adminheaderlogo" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
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
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
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
            <!--  Header End -->
            <div class="container mt-5">
                <h2 class="text-center mb-4">Registration and Payment Details</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-3" id="paymentTable">
                        <thead class="thead-dark">
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0): ?>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['qualification']; ?></td>
                                        <td><?php echo $row['institute']; ?></td>
                                        <td><?php echo $row['experience']; ?></td>
                                        <td><?php echo $row['interest']; ?></td>
                                        <td><?php echo $row['course']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['payment_id']; ?></td>
                                        <td><?php echo $row['payment_status']; ?></td>
                                        <td>
                                            <button class="btn btn-info btn-sm" onclick="printInvoice(
                                    '<?php echo $row['id']; ?>',
                                    '<?php echo $row['fullname']; ?>',
                                    '<?php echo $row['qualification']; ?>',
                                    '<?php echo $row['institute']; ?>',
                                    '<?php echo $row['experience']; ?>',
                                    '<?php echo $row['interest']; ?>',
                                    '<?php echo $row['course']; ?>',
                                    '<?php echo $row['email']; ?>',
                                    '<?php echo $row['phone']; ?>',
                                    '<?php echo $row['address']; ?>',
                                    '<?php echo $row['payment_id']; ?>',
                                    '<?php echo $row['payment_status']; ?>'
                                )">Print</button>



                                            <button class="btn btn-success btn-sm mt-3" onclick="exportTableToExcel('paymentTable', 'registration_data')">Excel</button>


                                            <!-- <button class="btn btn-success btn-sm mt-3" onclick="sendConfirmationEmail('<?php echo $row['email']; ?>')">Mail</button> -->
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="13" class="text-center">No records found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
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



        <!-- JavaScript invoice printing -->
        <script>
            function printInvoice(id, fullname, qualification, institute, experience, interest, course, email, phone, address, paymentId, paymentStatus) {
                var newWin = window.open("", "_blank");

                // Create the invoice format
                newWin.document.write(`
    <html>
    <head>
        <title>Mediature GxP Solutions Private Limited</title>
        <style>
            body { font-family: Arial, sans-serif; padding: 20px; }
            .invoice-box { max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); font-size: 16px; line-height: 24px; color: #555; }
            .invoice-box table { width: 100%; line-height: inherit; text-align: left; }
            .invoice-box table td { padding: 5px; vertical-align: top; }
            .invoice-box table tr.top table td { padding-bottom: 20px; }
            .invoice-box table tr.information table td { padding-bottom: 40px; }
            .invoice-box table tr.heading td { background: #eee; border-bottom: 1px solid #ddd; font-weight: bold; }
            .invoice-box table tr.item td { border-bottom: 1px solid #eee; }
            .invoice-box table tr.total td { border-top: 2px solid #eee; font-weight: bold; }
        </style>
    </head>
    <body>
        <div class="invoice-box">
            <h2>Invoice</h2>
            <table cellpadding="0" cellspacing="0">
                <tr class="information">
                    <td>
                        <strong>Full Name:</strong> ${fullname}<br>
                        <strong>Email:</strong> ${email}<br>
                        <strong>Phone:</strong> ${phone}<br>
                        <strong>Address:</strong> ${address}
                    </td>
                    <td>
                        <strong>Payment ID:</strong> ${paymentId}<br>
                        <strong>Payment Status:</strong> ${paymentStatus}<br>
                        <strong>Date:</strong> ${new Date().toLocaleDateString()}
                    </td>
                </tr>
                <tr class="heading">
                    <td>Field</td>
                    <td>Details</td>
                </tr>
                <tr class="item">
                    <td>ID</td>
                    <td>${id}</td>
                </tr>
                <tr class="item">
                    <td>Qualification</td>
                    <td>${qualification}</td>
                </tr>
                <tr class="item">
                    <td>Institute</td>
                    <td>${institute}</td>
                </tr>
                <tr class="item">
                    <td>Experience</td>
                    <td>${experience}</td>
                </tr>
                <tr class="item">
                    <td>Interest</td>
                    <td>${interest}</td>
                </tr>
                <tr class="item">
                    <td>Course</td>
                    <td>${course}</td>
                </tr>
            </table>
        </div>
    </body>
    </html>
    `);

                newWin.document.close();
                newWin.focus();
                newWin.print();
                newWin.close();
            }
        </script>



        <!-- javascript for excel -->

        <script>
            function exportTableToExcel(tableID, filename = '') {
                let downloadLink;
                let dataType = 'application/vnd.ms-excel';
                let tableSelect = document.getElementById(tableID);
                let tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

                // Specify file name
                filename = filename ? filename + '.xls' : 'excel_data.xls';

                // Create download link element
                downloadLink = document.createElement("a");

                document.body.appendChild(downloadLink);

                if (navigator.msSaveOrOpenBlob) {
                    let blob = new Blob(['\ufeff', tableHTML], {
                        type: dataType
                    });
                    navigator.msSaveOrOpenBlob(blob, filename);
                } else {
                    // Create a link to the file
                    downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                    // Setting the file name
                    downloadLink.download = filename;

                    // Triggering the function
                    downloadLink.click();
                }
            }
        </script>


        <!-- javascript for send the mail -->

        <script>
            function sendConfirmationEmail(email) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "send_email.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        alert(xhr.responseText); // Show success or failure message
                    } else {
                        alert("Error sending email.");
                    }
                };

                xhr.send("email=" + encodeURIComponent(email));
            }
        </script>



</body>

</html>

<?php
$conn->close();
?>