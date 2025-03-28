<?php
// Static admin credentials (for simplicity)
$admin_username = 'medi';
$admin_password = 'mediature@3456';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $admin_username && $password === $admin_password) {
        session_start();
        $_SESSION['admin_logged_in'] = true;
        header("Location: index.html");
    } else {
        echo "Invalid credentials";
    }
}
?>
