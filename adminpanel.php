<!DOCTYPE html>
<html lang="en">
<head>
  <title>College Website</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <style>
    .background-container {
            background-image: url(https://static.theprint.in/wp-content/uploads/2022/05/Students.jpg);
            opacity: 0.3;
            background-size: cover;
            background-position: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

    .container {
      text-align: center;
      color: #fff;
    }

    h1 {
      font-size: 40px;
      color: black;
      font-family: "Bebas Neue";
    }

    h2 {
      font-size: 100px;
      font-family: "Bebas Neue";
      color: black;
    }

    .buttons {
      margin-top: 20px;
    }

    .buttons button {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #fff;
      color: #000;
      border: none;
      cursor: pointer;
      margin-right: 10px;
      border-radius: 30px;
    }
    @media (max-width: 768px) {
      h2 {
        font-size: 40px;
      }
    }
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
    function goToDatabase() {
      window.location.href = "studentData.php";
    }
    function goToNewStudent() {
      window.location.href = "newStudent.php";
    }
  </script>
</head>
<body>
<div class="background-container"></div>
  <div class="container">
    <h1>MCKV Institute of Engineering</h1>
    <h2>Admin Panel</h2>
    <div class="buttons">
      <button onclick="goToDatabase()">Student Database</button>
      <button onclick="goToNewStudent()">Add new Student</button>
    </div>
  </div>
</body>
</html>
