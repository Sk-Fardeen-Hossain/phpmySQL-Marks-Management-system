<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Details</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/7.0.0/d3.min.js"></script>
</head>

<body>
  <div class="container mt-5" id="studentDetails">
    <h1>Student Marksheet</h1>
    <table class="table table-bordered" id="studentTable">
      <?php
      require_once('db_config.php');

      if (isset($_GET['reg'])) {
        $reg = $_GET['reg'];

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
    <div id="barChartContainer">
      <div id="barChart" style="height: 300px;"></div>
      <div id="studentInfo"></div>
    </div>
    <a href="studentlogin.php" class="btn btn-primary btn-print-hide">Back</a>
    <button class="btn btn-primary btn-print-hide" onclick="downloadPDF()">Download PDF</button>
  </div>

  <style>
    #barChartContainer {
      margin-top: 20px;
      background-color: #f7f7f7;
      border: 1px solid #ddd;
      padding: 10px;
      position: relative;
    }

    #studentInfo {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: white;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
  </style>

  <script>
    var data = [{
        subject: 'DE',
        score: <?php echo $student['de']; ?>
      },
      {
        subject: 'AC',
        score: <?php echo $student['ac']; ?>
      },
      {
        subject: 'MM',
        score: <?php echo $student['mm']; ?>
      },
      {
        subject: 'CN',
        score: <?php echo $student['cn']; ?>
      },
      {
        subject: 'CS',
        score: <?php echo $student['cs']; ?>
      },
      {
        subject: 'EE',
        score: <?php echo $student['ee']; ?>
      },
    ];

    var margin = {
        top: 20,
        right: 20,
        bottom: 30,
        left: 40
      },
      width = 400 - margin.left - margin.right,
      height = 250 - margin.top - margin.bottom;

    var x = d3.scaleBand()
      .range([0, width])
      .padding(0.1);

    var y = d3.scaleLinear()
      .range([height, 0]);

    var svg = d3.select("#barChart").append("svg")
      .attr("width", width + margin.left + margin.right)
      .attr("height", height + margin.top + margin.bottom)
      .append("g")
      .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

    x.domain(data.map(function(d) {
      return d.subject;
    }));
    y.domain([0, d3.max(data, function(d) {
      return d.score;
    })]);

    svg.selectAll(".bar")
      .data(data)
      .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) {
        return x(d.subject);
      })
      .attr("width", x.bandwidth())
      .attr("y", function(d) {
        return y(d.score);
      })
      .attr("height", function(d) {
        return height - y(d.score);
      });

    svg.append("g")
      .attr("transform", "translate(0," + height + ")")
      .call(d3.axisBottom(x));

    svg.append("g")
      .call(d3.axisLeft(y));

    function displayStudentInfo() {
      var totalMarks = <?php
                        $totalMarks = $student['de'] + $student['ac'] + $student['mm'] + $student['cn'] + $student['cs'] + $student['ee'];
                        echo $totalMarks;
                        ?>;
      var totalSubjects = 6;
      var percentage = (totalMarks / (totalSubjects * 100)) * 100;
      var cgpa = (totalMarks / (totalSubjects * 10)).toFixed(2);

      var studentInfoDiv = document.getElementById("studentInfo");
      studentInfoDiv.innerHTML = "Percentage: " + percentage.toFixed(2) + "%<br>CGPA: " + cgpa;
    }


    displayStudentInfo();

    function downloadPDF() {

      const element = document.getElementById("studentDetails");
      const pdfOptions = {
        margin: 10,
        filename: 'student_details.pdf',
        image: {
          type: 'jpeg',
          quality: 0.98
        },
        html2canvas: {
          scale: 2
        },
        jsPDF: {
          unit: 'mm',
          format: 'a4',
          orientation: 'portrait'
        }
      };

      html2pdf().from(element).set(pdfOptions).save();
    }
  </script>
</body>

</html>