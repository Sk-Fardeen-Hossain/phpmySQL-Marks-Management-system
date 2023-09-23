<?php
require_once('db_config.php');

if (isset($_POST['reg'])) {
    $reg = $_POST['reg'];

    $query = "SELECT * FROM results WHERE reg = '$reg'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);

        echo json_encode($student);
    } else {
        echo "Student not found";
    }
} else {
    echo "Invalid request";
}

mysqli_close($conn);
?>
