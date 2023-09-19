<?php
require_once('db_config.php');

if (isset($_POST['reg'])) {
    $reg = $_POST['reg'];

    // Query to delete a student by registration number
    $query = "DELETE FROM results WHERE reg = '$reg'";
    if (mysqli_query($conn, $query)) {
        echo '<tr>';
    echo '<td>' . $row['Name'] . '</td>';
    echo '<td>' . $row['roll'] . '</td>';
    echo '<td>' . $row['reg'] . '</td>';
    echo '<td>' . $row['cgpa'] . '</td>';
    echo '<td><a href="#" onclick="deleteRow(' . $row['reg'] . ')">Delete</a></td>';
    echo '</tr>';
    } else {
        echo "Error deleting student: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

mysqli_close($conn);
?>
