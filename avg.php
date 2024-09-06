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

// Build the column names for the average calculation
$columns = array_merge(range('p1', 'p8'), range('po1', 'po12'), ['pso1', 'pso2']);
$columnList = implode(',', $columns);

// Query to calculate the average ratings for all columns
$sql = "SELECT AVG(p1) AS avg_p1, AVG(p2) AS avg_p2, AVG(p3) AS avg_p3, AVG(p4) AS avg_p4,
               AVG(p5) AS avg_p5, AVG(p6) AS avg_p6, AVG(p7) AS avg_p7, AVG(p8) AS avg_p8,
               AVG(po1) AS avg_po1, AVG(po2) AS avg_po2, AVG(po3) AS avg_po3, AVG(po4) AS avg_po4,
               AVG(po5) AS avg_po5, AVG(po6) AS avg_po6, AVG(po7) AS avg_po7, AVG(po8) AS avg_po8,
               AVG(po9) AS avg_po9, AVG(po10) AS avg_po10, AVG(po11) AS avg_po11, AVG(po12) AS avg_po12,
               AVG(pso1) AS avg_pso1, AVG(pso2) AS avg_pso2
        FROM survey";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Fetch the result row as an associative array
    $row = $result->fetch_assoc();
} else {
    echo "Error executing the query: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Average Ratings Table</title>
    <style>
        h2 {
    color: #555;
    }
    table {
    border-collapse: collapse; /* Optional: To remove gaps between cell borders */
    border: 1px solid black; /* Add a border to the table */
    margin: 0 auto; /* This centers the table horizontally */
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
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">GCET</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="home.php">Home</a></li>
      <li><a href="admin.php">Rating Count</a></li>
      <li class="active"><a href="avg.php">Avg Ratings</a></li>
      <li><a href="feedback.php">Student feedback </a></li>
    </ul>
  </div>
</nav>
    <h1 align="center">Average Ratings Table</h1>
    <h2>Average ratings for p1 to p8</h2>
    <table>
        <tr>
            <th>Category</th>
            <th>Average Rating</th>
        </tr>
        <?php
        // Display the average ratings for p1 to p8
        for ($i = 1; $i <= 8; $i++) {
            $columnName = "p$i";
            $averageRating = round($row["avg_$columnName"], 2);
            echo "<tr><td>p$i</td><td>$averageRating</td></tr>";
        }
      echo "</table>";
        // Display the average ratings for po1 to po12
        echo "<h2>Average ratings for po1 to po12</h2>" ;
        echo "<table>";
        echo "<tr>
        <th>Category</th>
        <th>Average Rating</th>
        </tr>";
        for ($i = 1; $i <= 12; $i++) {
            $columnName = "po$i";
            $averageRating = round($row["avg_$columnName"], 2);
            echo "<tr><td>po$i</td><td>$averageRating</td></tr>";
        }
      echo "</table>";
        // Display the average ratings for pso1 and pso2
        
        echo "<h2>Average ratings for pso1 and pso2</h2>" ;
        echo "<table>";
        echo "<tr>
        <th>Category</th>
        <th>Average Rating</th>
        </tr>";
        echo "<tr><td>pso1</td><td>" . round($row['avg_pso1'], 2) . "</td></tr>";
        echo "<tr><td>pso2</td><td>" . round($row['avg_pso2'], 2) . "</td></tr>";
        ?>
    </table>
</body>
</html>
