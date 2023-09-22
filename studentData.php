<!DOCTYPE html>
<html>
<head>
    <title>Marks Data</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap CSS and JS files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f6f6f6;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0074a8;
            color: white;
        }

        td a {
            color: #0074a8;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
        }

        .modal-dialog {
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Marks Data</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Registration</th>
                    <th>DE</th>
                    <th>AC</th>
                    <th>MM</th>
                    <th>CN</th>
                    <th>CS</th>
                    <th>EE</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('db_config.php');

                $query = "SELECT * FROM results";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
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
                    echo '<td><a href="#" onclick="editRow(' . $row['reg'] . ')">Edit</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

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
                            <label for="editDE">DE</label>
                            <input type="text" class="form-control" id="editDE" name="de">
                        </div>
                        <div class="form-group">
                            <label for="editAC">AC</label>
                            <input type="text" class="form-control" id="editAC" name="ac">
                        </div>
                        <div class="form-group">
                            <label for="editMM">MM</label>
                            <input type="text" class="form-control" id="editMM" name="mm">
                        </div>
                        <div class="form-group">
                            <label for="editCN">CN</label>
                            <input type="text" class="form-control" id="editCN" name="cn">
                        </div>
                        <div class="form-group">
                            <label for="editCS">CS</label>
                            <input type="text" class="form-control" id="editCS" name="cs">
                        </div>
                        <div class="form-group">
                            <label for="editEE">EE</label>
                            <input type="text" class="form-control" id="editEE" name="ee">
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

            $.ajax({
                type: 'POST',
                url: 'fetchStudent.php',
                data: { reg: reg },
                success: function(response) {
                    const student = JSON.parse(response);
                    $('#editName').val(student.Name);
                    $('#editRoll').val(student.roll);
                    $('#editDE').val(student.de);
                    $('#editAC').val(student.ac);
                    $('#editMM').val(student.mm);
                    $('#editCN').val(student.cn);
                    $('#editCS').val(student.cs);
                    $('#editEE').val(student.ee);
                    $('#editModal').modal('show');
                }
            });
        }

        function saveEdit() {
            const editedName = $('#editName').val();
            const editedRoll = $('#editRoll').val();
            const editedDE = $('#editDE').val();
            const editedAC = $('#editAC').val();
            const editedMM = $('#editMM').val();
            const editedCN = $('#editCN').val();
            const editedCS = $('#editCS').val();
            const editedEE = $('#editEE').val();

            $.ajax({
                type: 'POST',
                url: 'editStudent.php',
                data: {
                    reg: editingReg,
                    name: editedName,
                    roll: editedRoll,
                    de: editedDE,
                    ac: editedAC,
                    mm: editedMM,
                    cn: editedCN,
                    cs: editedCS,
                    ee: editedEE
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
