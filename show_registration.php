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

// Check if there are any results
if ($result->num_rows > 0) {
    echo "<table class='table table-striped'>";
    echo "<thead><tr>
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
          </tr></thead><tbody>";

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
