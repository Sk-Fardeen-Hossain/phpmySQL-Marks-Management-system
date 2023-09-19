<!DOCTYPE html>
<html>
<head>
    <title>Real-Time MySQL CRUD</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Test Results</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Roll</th>
            <th>Registration</th>
            <th>CGPA</th>
            <th>Actions</th>
        </tr>
        <?php
        require_once('db_config.php');
        
        $query = "SELECT * FROM results";
        $result = mysqli_query($conn, $query);
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['Name'] . '</td>';
            echo '<td>' . $row['roll'] . '</td>';
            echo '<td>' . $row['reg'] . '</td>';
            echo '<td>' . $row['cgpa'] . '</td>';
            echo '<td><a href="#" onclick="deleteRow(' . $row['reg'] . ')">Delete</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
    <h2>Add New Record</h2>
    <form id="addForm">
        Name: <input type="text" name="name"><br> <!-- Assuming 'name' as the field name -->
        Roll: <input type="text" name="roll"><br>
        Reg: <input type="text" name="reg"><br>
        CGPA: <input type="text" name="cgpa"><br>
        <input type="submit" value="Add">
    </form>
    
    <script>
        // AJAX for real-time updates
        $('#addForm').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'addStudent.php',
            data: $(this).serialize(),
            success: function(response) {
                // Clear the form fields
                $('#addForm input[type="text"]').val('');
                
                // Append the new row to the table
                location.reload();
            }
        });
    });
    function deleteRow(reg) {
        if (confirm("Are you sure you want to delete this student?")) {
            $.ajax({
                type: 'POST',
                url: 'delStudent.php', // Update to match the actual script name
                data: { reg: reg },
                success: function(response) {
                    // Remove the deleted row from the table
                    $('tr[data-reg="' + reg + '"]').remove();

                    // Reload the page after successful deletion
                    location.reload();
                }
            });
        }
    }
    </script>
</body>
</html>
