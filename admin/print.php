<?php
// Include FPDF library
require('fpdf.php');

// Database connection (replace with your actual database credentials)
$conn = new mysqli('localhost', 'root', '', 'mediture');

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Fetch all records from the table
$sql = "SELECT * FROM registrations";
$result = $conn->query($sql);

// Create a new PDF document
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);

// Add title
$pdf->Cell(190, 10, 'Registration and Payment Details', 1, 1, 'C');

// Set the column headers
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 10, 'ID', 1);
$pdf->Cell(40, 10, 'Full Name', 1);
$pdf->Cell(30, 10, 'Qualification', 1);
$pdf->Cell(30, 10, 'Institute', 1);
$pdf->Cell(20, 10, 'Experience', 1);
$pdf->Cell(30, 10, 'Interest', 1);
$pdf->Cell(20, 10, 'Course', 1);
$pdf->Cell(50, 10, 'Email', 1);
$pdf->Ln(); // Move to the next line

// Fetch data and add rows to the PDF
$pdf->SetFont('Arial', '', 10);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(10, 10, $row['id'], 1);
        $pdf->Cell(40, 10, $row['fullname'], 1);
        $pdf->Cell(30, 10, $row['qualification'], 1);
        $pdf->Cell(30, 10, $row['institute'], 1);
        $pdf->Cell(20, 10, $row['experience'], 1);
        $pdf->Cell(30, 10, $row['interest'], 1);
        $pdf->Cell(20, 10, $row['course'], 1);
        $pdf->Cell(50, 10, $row['email'], 1);
        $pdf->Ln(); // Move to the next line
    }
} else {
    $pdf->Cell(190, 10, 'No records found', 1, 1, 'C');
}

// Close database connection
$conn->close();

// Output the PDF to the browser for download
$pdf->Output('D', 'registration_payment_details.pdf');
?>
