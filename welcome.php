<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MCKV Institute of Engineering</title>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica, sans-serif;
    }

    .background-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      background-image: url(https://static.theprint.in/wp-content/uploads/2022/05/Students.jpg);
      background-size: cover;
      background-position: center;
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7); /* Overlay with reduced opacity */
      z-index: -1;
    }

    .hero {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: #fff;
    }

    .hero h1 {
      font-size: 3rem;
      margin-bottom: 0;
      font-family: "Bebas Neue", sans-serif;
    }

    .hero h2 {
      font-size: 5rem;
      margin-top: 0;
      font-family: "Bebas Neue", sans-serif;
    }

    .navbar-container {
      background-color: rgba(0, 0, 0, 0.5);
      padding: 1rem 0;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
    }

    .navbar {
      padding: 1rem 0;
    }

    .navbar ul {
      list-style: none;
      padding: 0;
      display: flex;
      justify-content: center;
    }

    .navbar li {
      margin: 0 1rem;
    }

    .navbar a {
      text-decoration: none;
      color: #fff;
      font-weight: bold;
    }

    .content {
      padding: 2rem;
      text-align: left;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="background-container"></div>
  <div class="overlay"></div>
  <div class="navbar-container">
    <header class="navbar">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Notice board</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="adminlogin.php">Login</a></li> <!-- Redirect to adminlogin.php -->
        <li><a href="studentlogin.php">Results</a></li> <!-- Redirect to studentlogin.php -->
      </ul>
    </header>
  </div>

  <div class="hero">
    <h1>MCKV Institute of Engineering</h1>
    <h2>Results Portal</h2>
  </div>
</body>
</html>
