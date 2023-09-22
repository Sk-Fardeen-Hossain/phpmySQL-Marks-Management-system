<?php
require_once('db_config.php');

if (isset($_POST['reg'])) {
    $reg = $_POST['reg'];

    // Query to delete a student by registration number
    $query = "DELETE FROM results WHERE reg = '$reg'";
    if (mysqli_query($conn, $query)) {
        echo "Student with Registration Number: $reg has been deleted successfully.";
    } else {
        echo "Error deleting student: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

mysqli_close($conn);
?>
