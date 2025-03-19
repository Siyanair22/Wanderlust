<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $name = trim($_POST['name']);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    

    // Validate input fields
    if (empty($name) || empty($email)  || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    if (!$email) {
        echo "Invalid email format.";
        exit;
    }


    if (strlen($password) < 6) {
        echo "Password must be at least 6 characters long.";
        exit;
    }

    // Database connection
    $server = 'localhost';
    $user = 'root';
    $pass = '';     
    $db = 'ss';  
    $conn = mysqli_connect($server, $user, $pass, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $query = "INSERT INTO Registration (name, email, username, password) 
              VALUES ('$name', '$email', '$username', '$hashed_password')";

    if (mysqli_query($conn, $query)) {
        $_SESSION['user'] = $email;
        setcookie("user", $email, time() + (86400 * 30), "/"); // Cookie for 30 days
        echo "<h2>Registration Successful</h2>";
        echo "Name: $name<br>";
        echo "Email: $email<br>";
        echo "Username: $username<br>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
} else {
    echo "Invalid request method.";
}
