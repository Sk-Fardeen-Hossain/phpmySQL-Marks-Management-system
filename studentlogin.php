<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <title>Login Form</title>
    <style>
        html,
        body {
            display: flex;
            justify-content: center;
            font-family: Roboto, Arial, sans-serif;
            font-size: 15px;
            padding: 0;
            margin: 0;
        }

        .background-container {
            background-image: url(https://static.theprint.in/wp-content/uploads/2022/05/Students.jpg);
            opacity: 0.3;
            background-size: cover;
            background-position: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            height: 500px;
            margin-top: 100px;
        }

        input[type=text] {
            width: 100%;
            padding: 16px 8px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #8ebf42;
            color: white;
            padding: 14px 0;
            margin: 190px 0px;
            border: none;
            cursor: grabbing;
            width: 100%;
        }

        h1 {
            text-align: center;
            font-size: 18px;
        }

        button:hover {
            opacity: 0.8;
        }

        .formcontainer {
            text-align: left;
            margin: 24px 50px 12px;
        }

        .container {
            padding: 16px 0;
            text-align: left;
        }
    </style>
</head>
<?php
require_once('db_config.php');

if (isset($_POST['b1'])) {
    $reg = $_POST['reg'];

    // Query to check if the registration number exists in the database
    $query = "SELECT * FROM results WHERE reg = '$reg'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Redirect to "showResult.php" upon successful login
        header("Location: showResult.php");
        exit(); // Ensure no further processing occurs after redirection
    } else {
        echo "Invalid registration number. Please try again.";
    }
}
?>


<body>
    <div class="background-container"></div>
    <div class="formcontainer">
        <form action="showResult.php" method="get">
            <h1>Student Login</h1>
            <hr />
            <div class="container">
                <label for="reg"><strong>Registration Number:</strong></label>
                <input type="text" placeholder="Enter registration number" name="reg" required>
            </div>
            <button type="submit" name="b1">Login</button>
        </form>
    </div>
</body>

</html>