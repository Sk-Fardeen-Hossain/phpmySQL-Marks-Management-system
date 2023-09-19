<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Student Details</h1>
        <table class="table table-bordered">
            <?php
            require_once('db_config.php');
            
            if (isset($_GET['reg'])) {
                $reg = $_GET['reg'];
            
                // Query to retrieve student data
                $query = "SELECT * FROM results WHERE reg = '$reg'";
                $result = mysqli_query($conn, $query);
            
                if ($result && mysqli_num_rows($result) > 0) {
                    $student = mysqli_fetch_assoc($result);
                    
                    echo '<tr>';
                    echo '<th>Name</th>';
                    echo '<td>' . $student['Name'] . '</td>';
                    echo '</tr>';
                    
                    echo '<tr>';
                    echo '<th>Roll</th>';
                    echo '<td>' . $student['roll'] . '</td>';
                    echo '</tr>';
                    
                    echo '<tr>';
                    echo '<th>Registration Number</th>';
                    echo '<td>' . $student['reg'] . '</td>';
                    echo '</tr>';
                    
                    echo '<tr>';
                    echo '<th>CGPA</th>';
                    echo '<td>' . $student['cgpa'] . '</td>';
                    echo '</tr>';
                } else {
                    echo '<tr>';
                    echo '<td colspan="2">Student not found.</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="2">Invalid request.</td>';
                echo '</tr>';
            }
            ?>
        </table>
        <a href="studentlogin.php" class="btn btn-primary">Back</a>
    </div>
</body>

</html>
