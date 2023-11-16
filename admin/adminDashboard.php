<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #9bbec8;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #164863;
            color: black;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .navbar a {
            color: black;
            text-decoration: none;
            margin: 0 20px;
            transition: color 0.3s ease;
        }

        /*.navbar a:hover {
            color: #F5E8C7;
        }*/

        .body {
            margin: 40px;
        }

        a {
            display: block;
            margin: 10px 0;
            font-size: 18px;
            text-decoration: none;
            color: #333;
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #F5E8C7;
        }

        .text{
            font-size:20px;
            color:#fff;
        }

        .button-link {
            display: inline-block;
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }

        .button-link:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <div class="navbar">
        <a href="adminDashboard.php">Home</a>
        <span class="text">Hello, Administrator</span>
        <a href="../logout.php">Logout</a>
    </div>
    <div class="body">
        <a href="addDepartment.php">Add Department</a>
        <a href="editTrainee.php">Edit Trainee Details</a>
        <a href="reports.php">Department Reports</a>

    </div>
</body>
</html>
