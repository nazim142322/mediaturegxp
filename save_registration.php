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

// Check if the form data was sent via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect form data
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $qualification = $conn->real_escape_string($_POST['qualification']);
    $institute = $conn->real_escape_string($_POST['institute']);
    $experience = $conn->real_escape_string($_POST['experience']);
    $interest = $conn->real_escape_string($_POST['interest']);
    $course = $conn->real_escape_string($_POST['course']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);

    // SQL query to insert data into the `user_data` table
    $sql = "INSERT INTO user_data (fullname, qualification, institute, experience, interest, course, email, phone, address) 
            VALUES ('$fullname', '$qualification', '$institute', '$experience', '$interest', '$course', '$email', '$phone', '$address')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
