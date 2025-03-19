<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if (!$email) {
        echo "Invalid email format.";
        exit;
    }

    // Dummy user credentials for demonstration
    $valid_email = "siya.nair2209@gmail.com";
    $valid_password = "siya123"; // In real use, hash passwords!

    if ($email === $valid_email && $password === $valid_password) {
        $_SESSION['user'] = $email;
        setcookie("user", $email, time() + (86400 * 30), "/"); // 30 days
        echo "Login successful!";
    } else {
        echo "Invalid email or password.";
    }
} else {
    echo "Invalid request method.";
}
