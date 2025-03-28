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

// Get payment details from the request
$payment_id = $_POST['payment_id'];
$payment_status = $_POST['status'];
$user_name = "John Doe";  // Dynamic data can be passed here
$user_email = "john.doe@example.com";  // Dynamic data can be passed here
$amount = 500;  // In INR, this can be dynamic

// Insert payment details into the database
$sql = "INSERT INTO payments (payment_id, user_name, user_email, amount, payment_status) 
        VALUES ('$payment_id', '$user_name', '$user_email', '$amount', '$payment_status')";

if ($conn->query($sql) === TRUE) {
    echo "Payment details saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
