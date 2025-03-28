<?php
// Database connection
$servername = "localhost";
$username = "mediat_mediture";
$password = "UuZyATavTfRgJksJ4QbA";
$dbname = "mediat_mediture";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID from the query string
$id = $_GET['id'];

// Retrieve the registration data for the specific ID
$sql = "SELECT * FROM registrations WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Set headers for the Excel file
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=registration_data.xls");
    
    // Print table headers
    echo "ID\tFull Name\tQualification\tInstitute\tExperience\tInterest\tCourse\tEmail\tPhone\tAddress\tPayment ID\tPayment Status\n";

    // Fetch and print the data
    while ($row = $result->fetch_assoc()) {
        echo "{$row['id']}\t{$row['fullname']}\t{$row['qualification']}\t{$row['institute']}\t{$row['experience']}\t{$row['interest']}\t{$row['course']}\t{$row['email']}\t{$row['phone']}\t{$row['address']}\t{$row['payment_id']}\t{$row['payment_status']}\n";
    }
}

$conn->close();
?>
