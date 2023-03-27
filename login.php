<?php
// Start a session
session_start();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the email and password are correct
    if ($email == "admin@admin.com" && $password == "password123") {
        // Set the session variable
        $_SESSION["first_name"] = "John"; // Replace with the user's actual first name

        // Redirect to the welcome page
        header("Location: welcome.php");
        exit;
    } else {
        // Display an error message
        echo "Invalid email address or password.";
    }
}
?>