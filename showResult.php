<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Details</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.12/jspdf.plugin.autotable.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>

<body>
  <div class="container mt-5">
    <h1>Student Details</h1>
    <table class="table table-bordered" id="studentTable">
      <?php
      require_once('db_config.php');

      if (isset($_GET['reg'])) {
        $reg = $_GET['reg'];

        // Query to retrieve student data
        $query = "SELECT * FROM results WHERE reg = '$reg'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
          $student = mysqli_fetch_assoc($result);

          echo '<tr>';
          echo '<th>Name</th>';
          echo '<td>' . $student['Name'] . '</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<th>Roll</th>';
          echo '<td>' . $student['roll'] . '</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<th>Registration Number</th>';
          echo '<td>' . $student['reg'] . '</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<th>DE</th>';
          echo '<td>' . $student['de'] . '</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<th>AC</th>';
          echo '<td>' . $student['ac'] . '</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<th>MM</th>';
          echo '<td>' . $student['mm'] . '</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<th>CN</th>';
          echo '<td>' . $student['cn'] . '</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<th>CS</th>';
          echo '<td>' . $student['cs'] . '</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<th>EE</th>';
          echo '<td>' . $student['ee'] . '</td>';
          echo '</tr>';
        } else {
          echo '<tr>';
          echo '<td colspan="2">Student not found.</td>';
          echo '</tr>';
        }
      } else {
        echo '<tr>';
        echo '<td colspan="2">Invalid request.</td>';
        echo '</tr>';
      }
      ?>
    </table>
    <a href="studentlogin.php" class="btn btn-primary">Back</a>
    <button class="btn btn-primary" onclick="downloadPDF()">Download PDF</button>
  </div>
  <script>
    function downloadPDF() {
      const doc = new jsPDF();
      doc.autoTable({ html: '#studentTable' }); // Converts the table to PDF
      doc.save('student_details.pdf'); // Downloads the PDF
    }
  </script>
</body>

</html>
