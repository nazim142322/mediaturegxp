<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $subject = "Confirmation Email";
    $message = "Dear User,\n\nThank you for your registration. Your details are successfully recorded.\n\nBest Regards,\nYour Company";

    // Headers
    $headers = "From: mandalbiswajit510@gmail.com"; // Replace with your email address

    // Send email
    if (mail($email, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
}
?>
