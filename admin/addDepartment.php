<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            margin-top:100px;
            
        }

        .feedback-form {
            padding: 30px;
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #DDF2FD;
            
        }

        .feedback-form h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        .form-group input[type="text"] {
            width: 97%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-primary {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #555;
        }

        .nav-button {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    margin: 0 10px;
}

.nav-button:hover {
    background-color: #555;
}
span{
    font-size:20px;
}

    </style>
</head>

<body>
<div class="navbar">
    <form action="adminDashboard.php" method="get">
        <button type="submit" class="nav-button">Home</button>
    </form>
    <span>Hello Administrator</span>
    <form action="../logout.php" method="post">
        <button type="submit" class="nav-button">Logout</button>
    </form>
</div>


    <div class="container">
        <div class="feedback-form">
            <h2>Add Department</h2>
            <?php
            if (isset($feedbackMessage)) {
                echo "<p>$feedbackMessage</p>";
            }
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="TSLDepartment">TSL Department:</label>
                    <input type="text" id="TSLDepartment" name="TSLDepartment" required>
                </div>

                <div class="form-group">
                    <label for="ProjectGuide">Project Guide:</label>
                    <input type="text" id="ProjectGuide" name="ProjectGuide" required>
                </div>

                <div class="form-group">
                    <label for="ProjectTitle">Project Title:</label>
                    <input type="text" id="ProjectTitle" name="ProjectTitle" required>
                </div>

                <button type="submit" class="btn-primary">Add Department</button>
            </form>
        </div>
    </div>
</body>

</html>
