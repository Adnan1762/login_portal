<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit/Delete Trainee Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #9bbec8;
            margin: 0;
            padding: 0;
        }
        .text{
            font-size:20px;
        }

        .navbar {
            background-color: #164863;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            width: 350px;
            padding: 40px;
            background-color: #ddf2fd;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
            font-size: 14px;
            color: #555;
        }

        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            margin-left:1px;
        }

        .button {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-left:10px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .delete-button {
            background-color: #d9534f;
        }

        .delete-button:hover {
            background-color: #c9302c;
        }

        .navbar a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .navbar a:hover {
            background-color: #0056b3;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
<div class="navbar">
        <a href="adminDashboard.php">Home</a>
        <span class="text">Hello, Administrator</span>
        <a href="../logout.php">Logout</a>
    </div>
    <div class="container">
        <div class="form-container">
            <h2>Edit Trainee Details</h2>
            <form action="editDetails.php" method="post">
                <div class="input-group">
                    <label for="email" class="label">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <button type="submit" class="button">Edit</button>
            </form>
            <br>
            <h2>Delete Trainee</h2>
            <form action="deleteTrainee.php" id="delete-form" method="post">
                <div class="input-group">
                    <label for="email" class="label">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <button type="button" class="button delete-button" id="delete-button">Delete</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#delete-button").on("click", function () {
                if (confirm("Are you sure you want to delete this trainee?")) {
                    $("#delete-form").submit();
                }
            });
        });
    </script>
</body>

</html>
