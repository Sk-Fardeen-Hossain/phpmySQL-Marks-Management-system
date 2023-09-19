<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <title>Result Management System</title>
  <link rel="stylesheet" href="landingpage.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
    function goToAdmin() {
      window.location.href = "adminlogin.php";
    }
    function goToStudent() {
      window.location.href = "studentlogin.php";
    }
  </script>
</head>
<body>
<div class="background-container"></div>
  <div class="container">
    <h1>Result system with php,mySQL</h1>
    <h2>Results Portal</h2>
    <div class="buttons">
      <label style="color:black;"><strong>Login as: </strong></label><button onclick="goToAdmin()">Admin</button>
      <button onclick="goToStudent()">Student</button>
    </div>
  </div>
</body>
</html>
