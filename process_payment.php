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

// Retrieve POST data
$fullname = $_POST['fullname'];
$qualification = $_POST['qualification'];
$institute = $_POST['institute'];
$experience = $_POST['experience'];
$interest = $_POST['interest'];
$course = $_POST['course'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$payment_id = $_POST['payment_id'];
$payment_status = $_POST['payment_status'];

// Validate required fields
if (
    empty($fullname) || empty($qualification) || empty($institute) || empty($experience) || empty($interest) ||
    empty($course) || empty($email) || empty($phone) || empty($address) || empty($payment_id)
) {
    echo "All fields are required.";
    exit;
}

// SQL query to insert form data into the registrations table
$sql = "INSERT INTO registrations (fullname, qualification, institute, experience, interest, course, email, phone, address, payment_id, payment_status)
        VALUES ('$fullname', '$qualification', '$institute', '$experience', '$interest', '$course', '$email', '$phone', '$address', '$payment_id', '$payment_status')";

if ($conn->query($sql) === TRUE) {
    // Redirect to thank you page
    header("Location: thankyou.html");
    exit(); // Make sure to call exit after redirecting
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
