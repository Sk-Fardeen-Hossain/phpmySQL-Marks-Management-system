<?php
require_once('db_config.php');

$name = $_POST['name'];
$roll = $_POST['roll'];
$reg = $_POST['reg'];
$cgpa = $_POST['cgpa'];

$query = "INSERT INTO results (Name, roll, reg, cgpa) VALUES ('$name', '$roll', '$reg', '$cgpa')";

if (mysqli_query($conn, $query)) {
    // Fetch the newly added record and return it as HTML
    $newRecordQuery = "SELECT * FROM results WHERE reg = '$reg'";
    $result = mysqli_query($conn, $newRecordQuery);
    $row = mysqli_fetch_assoc($result);

    echo '<tr>';
    echo '<td>' . $row['Name'] . '</td>';
    echo '<td>' . $row['roll'] . '</td>';
    echo '<td>' . $row['reg'] . '</td>';
    echo '<td>' . $row['cgpa'] . '</td>';
} else {
    echo "Error adding record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
