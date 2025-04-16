<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if (!$email) {
        echo "<script>alert('Invalid email format.'); window.location.href='login.html';</script>";
        exit;
    }

    // Database connection
    $server = 'localhost';
    $user = 'root';
    $pass = 's123';     
    $db = 'details';  
    $conn = mysqli_connect($server, $user, $pass, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to check if the email exists in the database
    $query = "SELECT * FROM Data WHERE emailid = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Check if the password matches (for simplicity, assuming it's not hashed in this example)
        if ($password === $user['password']) {
            // Store session and set cookie
            $_SESSION['user'] = $email;
            setcookie("user", $email, time() + (86400 * 30), "/"); // Cookie for 30 days
            // Redirect to index page
            header("Location: index.html");
            exit;
        } else {
            echo "<script>alert('Invalid password.'); window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('User not found.'); window.location.href='login.html';</script>";
    }

    mysqli_close($conn);
} else {
    echo "Invalid request method.";
}
?>
