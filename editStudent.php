<?php
require_once('db_config.php');

$reg = $_POST['reg'];

$name = $_POST['name'];
$roll = $_POST['roll'];
$de = $_POST['de'];
$ac = $_POST['ac'];
$mm = $_POST['mm'];
$cn = $_POST['cn'];
$cs = $_POST['cs'];
$ee = $_POST['ee'];

$query = "UPDATE results SET Name = '$name', roll = '$roll', de = '$de', ac = '$ac', mm = '$mm', cn = '$cn', cs = '$cs', ee = '$ee' WHERE reg = '$reg'";

if (mysqli_query($conn, $query)) {
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
