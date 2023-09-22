<?php
require_once('db_config.php');

$reg = $_POST['reg'];

// Assuming you have other fields (e.g., 'Name', 'roll') in your form
$name = $_POST['name'];
$roll = $_POST['roll'];
$de = $_POST['de'];
$ac = $_POST['ac'];
$mm = $_POST['mm'];
$cn = $_POST['cn'];
$cs = $_POST['cs'];
$ee = $_POST['ee'];

// Add all fields you want to update in the SET clause except 'marks'
$query = "UPDATE results SET Name = '$name', roll = '$roll', de = '$de', ac = '$ac', mm = '$mm', cn = '$cn', cs = '$cs', ee = '$ee' WHERE reg = '$reg'";

if (mysqli_query($conn, $query)) {
    // Fetch the updated record and return it as HTML
    $updatedRecordQuery = "SELECT * FROM results WHERE reg = '$reg'";
    $result = mysqli_query($conn, $updatedRecordQuery);
    $row = mysqli_fetch_assoc($result);

    echo '<tr>';
    echo '<td>' . $row['Name'] . '</td>';
    echo '<td>' . $row['roll'] . '</td>';
    echo '<td>' . $row['reg'] . '</td>';
    echo '<td>' . $row['de'] . '</td>';
    echo '<td>' . $row['ac'] . '</td>';
    echo '<td>' . $row['mm'] . '</td>';
    echo '<td>' . $row['cn'] . '</td>';
    echo '<td>' . $row['cs'] . '</td>';
    echo '<td>' . $row['ee'] . '</td>';
    echo '<td><a href="#" onclick="editRow(' . $row['reg'] . ')">Edit</a> | <a href="#" onclick="deleteRow(' . $row['reg'] . ')">Delete</a></td>';
    echo '</tr>';
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
