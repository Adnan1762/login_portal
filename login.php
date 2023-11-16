<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your existing code for database connection and user input retrieval
    
    // Get reCAPTCHA response from the form
    $recaptchaSecretKey = ""; // Replace with your reCAPTCHA secret key
    $recaptchaResponse = $_POST["g-recaptcha-response"];
    echo  $recaptchaResponse ;
    // Verify the reCAPTCHA response
    $recaptchaVerificationUrl = "https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecretKey}&response={$recaptchaResponse}";
    $recaptchaVerification = json_decode(file_get_contents($recaptchaVerificationUrl));
    
    if ($recaptchaVerification->success) {
        // reCAPTCHA verification successful
        // Your existing code for user authentication
        
        if (password_verify($password, $stored_password)) {
            // Password is correct, user is authenticated
            $_SESSION["email"] = $email;
            echo  $recaptchaResponse ;
           // header("location: dashboard.php");
        } else {
            echo '<script>alert("Invalid User/Password");</script>';
            header("refresh: 0; url=index.php");
        }
    } else {
        // reCAPTCHA verification failed
        echo '<script>alert("reCAPTCHA verification failed");</script>';
        header("refresh: 0; url=index.php");
    }
} else {
    // Handle non-POST requests
    header("location: index.php");
}



// Database connection parameters
$dbHost = "localhost:3306"; // Change this if your MySQL server is on a different host
$dbUsername = "root"; // 
$dbPassword = ""; // MySQL password (default for XAMPP)
$dbName = "lgdb"; // The name of the database you created

// Create a database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get user input
$email = $_POST['email'];
$password = $_POST['password'];

// Sanitize user input (prevent SQL injection)
$email = mysqli_real_escape_string($conn, $email);

// Query the database
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}


// Check if a user with the provided email exists
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $stored_password = $row['password'];

    // Verify the password
    if (password_verify($password, $stored_password)) {
        

        // Password is correct, user is authenticated
        // You can redirect the user to a dashboard or some other page
        $_SESSION["email"]=$email;
        //echo file_get_contents('dashboard.php');
header("location:dashboard.php");
    
}

        else {
            echo '<script>alert("Invalid User/Password");</script>';
            header("refresh: 0; url=index.php");

    }
} else {
    // No user found with the provided email
    echo '<script>alert("User not found");</script>';
header("refresh: 0; url=index.php");
}

// Close the database connection
mysqli_close($conn);
?>