<html>
    <head>
    <style>
        h2 {
    color: #555;
    }
    table {
    border-collapse: collapse;
    width:50%; /* Optional: To remove gaps between cell borders */
    border: 1px solid black; /* Add a border to the table */
    margin: 0 auto;
    text-align:center;
     /* This centers the table horizontally */
    }
    th, td {
    border: 1px solid black; /* Set a border for table cells */
    padding: 8px; /* Add some padding for better visualization */
    text-align: center; /* Center the text within the cells */
    }
    h1 {
    color: #4CAF50;
    position: center;
    }
    body {
    text-align: center;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
  }
  nav.navbar {
      background-color: #4CAF50;
    }
    nav.navbar a {
      color: #000100;
    }
    </style>
</head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">GCET</a>
    </div>
    <ul class="nav navbar-nav">
    <li><a href="home.php">Home</a></li>
    <li><a href="admin.php">Rating count </a></li>
    <li><a href="avg.php">Avg Ratings</a></li>
    <li class="active"><a href="feedback.php">Student feedback</a></li>
    </ul>
  </div>
</nav>
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

// Query to get feedback, name, and roll from the survey table
$sql = "SELECT name, roll, feedback FROM survey";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Check if there are any rows returned
    if ($result->num_rows > 0) 
    {
        echo "<h1> Student Feedback </h1>";
        echo "<table border='1' >";
        echo "<tr ><th>Name</th><th>Roll</th><th>Feedback</th></tr>";
        // Loop through the rows and display the feedback, name, and roll in a table
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['name'] . "</td><td>" . $row['roll'] . "</td><td>" . $row['feedback'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No feedback found in the survey table.";
    }
} else {
    echo "Error executing the query: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
