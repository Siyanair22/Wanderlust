<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if (!$email) {
        echo "Invalid email format.";
        exit;
    }

    if (strlen($password) < 6) {
        echo "Password must be at least 6 characters long.";
        exit;
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // In a real application, save the user to a database
    $_SESSION['user'] = $email;
    setcookie("user", $email, time() + (86400 * 30), "/"); // 30 days

    echo "Registration successful! You can now login.";
} else {
    echo "Invalid request method.";
}
