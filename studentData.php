<!DOCTYPE html>
<html>
<head>
    <title>Real-Time MySQL CRUD</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap CSS and JS files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
            echo '<td>' . $row['cgpa'] . '</td>'; // Assuming CGPA column name
            echo '<td><a href="#" onclick="editRow(' . $row['reg'] . ')">Edit</a></td>';
            echo '</tr>';
        }
        ?>
    </table>

    <!-- Bootstrap modal for editing -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Row</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Edit form -->
                    <form id="editForm">
                        <input type="hidden" id="editReg" name="reg">
                        <div class="form-group">
                            <label for="editName">Name</label>
                            <input type="text" class="form-control" id="editName" name="name">
                        </div>
                        <div class="form-group">
                            <label for="editRoll">Roll</label>
                            <input type="text" class="form-control" id="editRoll" name="roll">
                        </div>
                        <div class="form-group">
                            <label for="editCGPA">CGPA</label>
                            <input type="text" class="form-control" id="editCGPA" name="cgpa">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveEdit()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let editingReg;

        function editRow(reg) {
            editingReg = reg;

            // Fetch row data using AJAX and populate the modal form
            $.ajax({
                type: 'POST',
                url: 'fetchStudent.php',
                data: { reg: reg },
                success: function(response) {
                    const student = JSON.parse(response);
                    $('#editName').val(student.Name);
                    $('#editRoll').val(student.roll);
                    $('#editCGPA').val(student.cgpa);
                    $('#editModal').modal('show');
                }
            });
        }

        function saveEdit() {
            // Get edited values from the form
            const editedName = $('#editName').val();
            const editedRoll = $('#editRoll').val();
            const editedCGPA = $('#editCGPA').val();

            // Update the row data using AJAX
            $.ajax({
                type: 'POST',
                url: 'editStudent.php',
                data: {
                    reg: editingReg,
                    name: editedName,
                    roll: editedRoll,
                    cgpa: editedCGPA
                },
                success: function(response) {
                    location.reload();
                }
            });

            $('#editModal').modal('hide');
        }
    </script>
</body>
</html>
