<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    /* Add background color to the navigation bar */
    nav.navbar {
      background-color: #4CAF50;
    }
    nav.navbar a {
      color: #000100;
    }
  </style>
</head>
<body bgcolor=" #f0f0f0">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">GCET</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="home.php">Home</a></li> 
      <li><a href="admin.php">Rating Count</a></li>
      <li><a href="avg.php">Avg Ratings</a></li>
      <li><a href="feedback.php">Student feedback</a></li>
    </ul>
  </div>
</nav>
<?php
// Replace these variables with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ashok";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
  $q=mysqli_query($conn,select * from survey);
}
?>

</body>
</html>

<?php
// Replace these variables with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ashok";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
  $q=mysqli_query($conn,select * from survey);
}
?>

</body>
</html>
