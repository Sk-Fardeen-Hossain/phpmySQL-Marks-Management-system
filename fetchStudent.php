<?php
require_once('db_config.php');

if (isset($_POST['reg'])) {
    $reg = $_POST['reg'];

    // Query to fetch student data by registration number
    $query = "SELECT * FROM results WHERE reg = '$reg'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch student data
        $student = mysqli_fetch_assoc($result);
        
        // Return student data as JSON
        echo json_encode($student);
    } else {
        echo "Student not found";
    }
} else {
    echo "Invalid request";
}

mysqli_close($conn);
?>
