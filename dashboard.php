<?php  
session_start();
if (!isset($_SESSION['email'])) {
    echo '<script>alert("Please Log in first");</script>';
    header("Location: index.php"); // Redirect to the login page if not logged in
    exit();
}
$dbHost = "localhost:3306"; // Change this if your MySQL server is on a different host
$dbUsername = "root"; // 
$dbPassword = ""; // MySQL password (default for XAMPP)
$dbName = "lgdb"; // The name of the database you created

// Create a database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
$email=$_SESSION["email"];
$query = "SELECT * FROM details WHERE EmailID = '$email'";
$result = mysqli_query($conn, $query);
$name="";

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
if (mysqli_num_rows($result) === 1) { 
    $_SESSION['profile_completed']=1;
$row = mysqli_fetch_assoc($result);
$name=$row["Name"];
}
else
{
    $_SESSION['profile_completed']=0;
}

// profile picture retrieval from database
$query1="select * from pfp where EmailID='$email'";
        $result1 = mysqli_query($conn, $query1);
        $loc="";
        if (!$result1) {
            die("Query failed: " . mysqli_error($conn));
        }
        if (mysqli_num_rows($result1) === 1) { 
            $row1 = mysqli_fetch_assoc($result1);
            $loc=$row1["imgloc"];
            }
 $imageLocation = $loc; //  image location


?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #9BBEC8;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #164863;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 20px;
            font-size: 18px;
        }

        .profile-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .container {
            margin: 20px;
        }

        .dashboard-links {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        .dashboard-links a {
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            padding: 15px 20px;
            margin: 10px 0;
            border-radius: 5px;
            text-align: center;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .dashboard-links a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#">Home</a>
        <span>Hello, <?php echo $name ?></span>
        <a href="pfpUpload.php">
            <img class="profile-image" src="<?php echo $imageLocation ?>" alt="Profile Picture">
        </a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="container">
        <div class="dashboard-links">
            <a href="completeProfile.php">Complete Your Profile</a>
            <a href="show_profile.php">View Your Profile</a>
            <a href="feedback.php"> Give Your Feedback</a>
        </div>
    </div>
</body>
</html>
