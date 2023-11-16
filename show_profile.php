<?php  
session_start();
if (!isset($_SESSION['email'])) {
    echo '<script>alert("Please Log in first");</script>';
    header("refresh: 0.0; url=login.php");
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
$data=array();
$row=array();
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
if (mysqli_num_rows($result) === 1) { 
$row = mysqli_fetch_assoc($result);
$name=$row["Name"];
}
$data=$row;

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
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #164863;
            color: #fff;
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
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
            padding: 20px;
            background-color: #F7EFE5;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #F7EFE5;
            color: #164863;
        }

        #home-link {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        #home-link:hover {
            background-color: #555;
        }

        .message {
            margin-top: 20px;
            font-size: 18px;
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="dashboard.php">Home</a>
        <span>Hello, <?php echo $name ?></span>
        <a href="pfpUpload.php">
            <img class="profile-image" src="<?php echo $imageLocation ?>" alt="Profile Picture">
        </a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="container">
        <?php
        if ($_SESSION["profile_completed"] === 1) {
            echo '<h2>Profile Details</h2>';
            echo '<table>';
            foreach ($data as $key => $value) {
                echo '<tr><th>' . $key . '</th><td>' . $value . '</td></tr>';
            }
            echo '</table>';
        } else {
            echo '<div class="message">Profile not completed. Click on Complete Profile to fill your details.</div>';
            echo '<a id="home-link" href="completeProfile.php">Complete Profile</a>';
        }
        ?>
    </div>
</body>
</html>
