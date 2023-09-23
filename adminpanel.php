<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin Dashboard</title>
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
            font-size: 24px;
            margin-bottom: 20px;
        }

        .nav-link {
            display: block;
            background-color: #0074a8;
            color: white;
            padding: 14px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
            font-size: 18px;
            text-align: center;
            text-decoration: none;
    
            margin-bottom: 10px;
        }

        .nav-link:hover {
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1>Admin Dashboard</h1>
            <a class="nav-link" href="studentData.php">Student Data</a>
            <a class="nav-link" href="newStudent.php">New Student</a>
        </div>
    </div>
</body>

</html>