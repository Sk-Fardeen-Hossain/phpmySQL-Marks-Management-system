<!DOCTYPE html>
<html>
<head>
    <title>Marks</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap CSS and JS files for improved styling -->
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

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        #addForm {
            max-width: 400px;
            margin: 0 auto;
        }

        #addForm input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #addForm input[type="submit"] {
            background-color: #0074a8;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }

        #addForm input[type="submit"]:hover {
            background-color: #005d91;
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
                    echo '<tr data-reg="' . $row['reg'] . '">';
                    echo '<td>' . $row['Name'] . '</td>';
                    echo '<td>' . $row['roll'] . '</td>';
                    echo '<td>' . $row['reg'] . '</td>';
                    echo '<td>' . $row['de'] . '</td>';
                    echo '<td>' . $row['ac'] . '</td>';
                    echo '<td>' . $row['mm'] . '</td>';
                    echo '<td>' . $row['cn'] . '</td>';
                    echo '<td>' . $row['cs'] . '</td>';
                    echo '<td>' . $row['ee'] . '</td>';
                    echo '<td><a href="#" onclick="deleteRow(' . $row['reg'] . ')">Delete</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <h2>Add New Record</h2>
        <form id="addForm">
            <input type="text" class="form-control" name="name" placeholder="Name" required>
            <input type="text" class="form-control" name="roll" placeholder="Roll" required>
            <input type="text" class="form-control" name="reg" placeholder="Registration" required>
            <input type="text" class="form-control" name="de" placeholder="DE" required>
            <input type="text" class="form-control" name="ac" placeholder="AC" required>
            <input type="text" class="form-control" name="mm" placeholder="MM" required>
            <input type="text" class="form-control" name="cn" placeholder="CN" required>
            <input type="text" class="form-control" name="cs" placeholder="CS" required>
            <input type="text" class="form-control" name="ee" placeholder="EE" required>
            <input type="submit" class="btn btn-primary" value="Add">
        </form>
    </div>

    <script>
        $('#addForm').submit(function(event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'addStudent.php',
                data: {
                    name: $('#addForm input[name="name"]').val(),
                    roll: $('#addForm input[name="roll"]').val(),
                    reg: $('#addForm input[name="reg"]').val(),
                    de: $('#addForm input[name="de"]').val(),
                    ac: $('#addForm input[name="ac"]').val(),
                    mm: $('#addForm input[name="mm"]').val(),
                    cn: $('#addForm input[name="cn"]').val(),
                    cs: $('#addForm input[name="cs"]').val(),
                    ee: $('#addForm input[name="ee"]').val(),
                },
                success: function(response) {
                    $('#addForm input[type="text"]').val('');
                    location.reload();
                }
            });
        });

        function deleteRow(reg) {
            if (confirm("Are you sure you want to delete this student?")) {
                $.ajax({
                    type: 'POST',
                    url: 'delStudent.php',
                    data: { reg: reg },
                    success: function(response) {
                        $('tr[data-reg="' + reg + '"]').remove();
                        location.reload();
                    }
                });
            }
        }
    </script>
</body>
</html>
