<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login Form</title>
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            height: 100%;
        }

        .container {
            display: flex;
            flex-direction: column; 
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            max-width: 400px;
            width: 100%;
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.3);
        }

        .card h1 {
            font-size: 18px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-button {
            background-color: #008abc;
            color: white;
            padding: 10px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
            font-size: 18px;
        }

        .submit-button:hover {
            opacity: 0.8;
        }

        .back-to-home-button {
            font-size: 16px;
            color: #008abc;
            text-decoration: none;
        }
    </style>
</head>
<?php
require_once('db_config.php');

if (isset($_POST['b1'])) {
    $reg = $_POST['reg'];

    $query = "SELECT * FROM results WHERE reg = '$reg'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {

        header("Location: showResult.php");
        exit();
    } else {
        echo "Invalid registration number. Please try again.";
    }
}
?>


<body>
    <div class="container">
        <div class="card">
            <form action="showResult.php" method="get">
                <h1>Student Login</h1>
                <hr />
                <div class="form-group">
                    <label for="reg"><strong>Registration Number:</strong></label>
                    <input class="form-control input-field" type="text" placeholder="Enter registration number" name="reg" required>
                </div>
                <button class="btn btn-success submit-button" type="submit" name="b1">Login</button>
            </form>
            <a class="back-to-home-button" href="welcome.php">Back to Homepage</a>
        </div>
    </div>
</body>

</html>





