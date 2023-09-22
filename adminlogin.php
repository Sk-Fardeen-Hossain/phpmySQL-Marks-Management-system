<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin Login</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            height: 100%;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
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

        .card h2 {
            font-size: 28px;
            margin-bottom: 20px;
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
            background-color: #0074a8;
        }

        .back-to-home {
            font-size: 16px;
            color: #008abc;
            text-decoration: none;
        }
    </style>
    <?php
    $hostname = '127.0.0.1';
    $username = 'root';
    $password = '';
    $database = 'csiproject';

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["userid"]) && isset($_POST["password"])) {
        $enteredUserId = mysqli_real_escape_string($connection, $_POST["userid"]);
        $enteredPassword = mysqli_real_escape_string($connection, $_POST["password"]);

    $query = "SELECT * FROM admintable WHERE userid = '$enteredUserId' AND pw = '$enteredPassword'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        header("Location: adminpanel.php");
        exit();
    }
    } else {
        $errorMessage = "Invalid credentials. Please try again.";
    }
}

mysqli_close($connection);

    ?>
</head>
<body>
<div class="container">
    <div class="card">
        <?php if(isset($errorMessage)){?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php } ?>
        <h2>Admin Login</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="userid">User Identification number:</label>
                <input class="form-control input-field" type="text" placeholder="Enter User ID" name="userid" id="userid" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control input-field" type="password" placeholder="Enter Password" name="password" id="password" required>
            </div>
            <button class="btn btn-success submit-button" type="submit" name="b1">Login</button>
        </form>
        <a class="back-to-home" href="welcome.php">Back to Homepage</a>
    </div>
</div>
</body>
</html>
