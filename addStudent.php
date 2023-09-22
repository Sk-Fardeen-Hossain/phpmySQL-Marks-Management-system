<?php
require_once('db_config.php');

$name = $_POST['name'];
$roll = $_POST['roll'];
$reg = $_POST['reg'];
$de = $_POST['de'];
$ac = $_POST['ac'];
$mm = $_POST['mm'];
$cn = $_POST['cn'];
$cs = $_POST['cs'];
$ee = $_POST['ee'];

$query = "INSERT INTO results (Name, roll, reg, de, ac, mm, cn, cs, ee) 
          VALUES ('$name', '$roll', '$reg', '$de', '$ac', '$mm', '$cn', '$cs', '$ee')";

if (mysqli_query($conn, $query)) {
    $newRecordQuery = "SELECT * FROM results WHERE reg = '$reg'";
    $result = mysqli_query($conn, $newRecordQuery);
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
    echo '</tr>';
} else {
    echo "Error adding record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
