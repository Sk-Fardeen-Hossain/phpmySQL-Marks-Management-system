<?php
require_once('db_config.php');

$reg = $_POST['reg'];

// Assuming you have other fields (e.g., 'Name', 'roll', and 'cgpa') in your form
$name = $_POST['name'];
$roll = $_POST['roll'];
$cgpa = $_POST['cgpa'];

// Add all fields you want to update in the SET clause except 'marks'
$query = "UPDATE results SET Name = '$name', roll = '$roll', cgpa = '$cgpa' WHERE reg = '$reg'";

if (mysqli_query($conn, $query)) {
    // Fetch the updated record and return it as HTML
    $updatedRecordQuery = "SELECT * FROM results WHERE reg = '$reg'";
    $result = mysqli_query($conn, $updatedRecordQuery);
    $row = mysqli_fetch_assoc($result);

    echo '<tr>';
    echo '<td>' . $row['Name'] . '</td>';
    echo '<td>' . $row['roll'] . '</td>';
    echo '<td>' . $row['reg'] . '</td>';
    echo '<td>' . $row['cgpa'] . '</td>';
    echo '<td><a href="#" onclick="editRow(' . $row['reg'] . ')">Edit</a> | <a href="#" onclick="deleteRow(' . $row['reg'] . ')">Delete</a></td>';
    echo '</tr>';
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
