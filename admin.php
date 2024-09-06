<html>
    <head>
    <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <style>
            nav.navbar {
      background-color: #4CAF50;
    }
    nav.navbar a {
      color: #000100;
    }
     body {
    text-align: center;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
  }
             h1 {
      color: #4CAF50;
    }
    h2 {
      color:  #555;
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
      <li class="active"><a href="admin.php">Rating Count</a></li>
      <li><a href="avg.php">Avg Ratings</a></li>
      <li><a href="feedback.php">Student feedback </a></li>
    </ul>
  </div>
</nav>
    <h1 align="center">Geethanjali College of Engineering & Technology</h1>
    <h2 align="center">GRADUATE SURVEY</h2>
</body>
    </html>

<?php
// Database connection parameters
$host = "localhost"; // Replace with your database host
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "ashok"; // Replace with your database name

// Connect to MySQL
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get value counts for the given column and rating (1 to 5)
function getValueCounts($conn, $column)
{
    $valueCounts = array();
    for ($rating = 1; $rating <= 5; $rating++) {
        $sql = "SELECT COUNT(*) AS count FROM survey WHERE $column = $rating";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $valueCounts[$rating] = $row['count'];
    }

    return $valueCounts;
}

// Get value counts for columns p1 to p8
$p_ratings = array();
for ($i = 1; $i <= 8; $i++) {
    $column = "p" . $i;
    $p_ratings[$column] = getValueCounts($conn, $column);
}

// Get value counts for columns po1 to po12
$po_ratings = array();
for ($i = 1; $i <= 12; $i++) {
    $column = "po" . $i;
    $po_ratings[$column] = getValueCounts($conn, $column);
}

// Get value counts for columns pso1 and pso2
$pso_ratings = array();
$pso_ratings['pso1'] = getValueCounts($conn, 'pso1');
$pso_ratings['pso2'] = getValueCounts($conn, 'pso2');

// Close the database connection
$conn->close();
?>

<!-- Display the value counts for columns p1 to p8 -->
<h2>Value Counts for Columns p1 to p8</h2>
<table border="1" align="center">
    <tr>
        <th>Column Name</th>
        <?php for ($rating = 1; $rating <= 5; $rating++) : ?>
            <th>Rating <?php echo $rating; ?></th>
        <?php endfor; ?>
    </tr>
    <?php foreach ($p_ratings as $column => $valueCounts) : ?>
        <tr>
            <td><?php echo $column; ?></td>
            <?php for ($rating = 1; $rating <= 5; $rating++) : ?>
                <td><?php echo $valueCounts[$rating]; ?></td>
            <?php endfor; ?>
        </tr>
    <?php endforeach; ?>
</table>

<!-- Display the value counts for columns po1 to po12 -->
<h2>Value Counts for Columns po1 to po12</h2>
<table border="1" align="center">
    <tr>
        <th>Column Name</th>
        <?php for ($rating = 1; $rating <= 5; $rating++) : ?>
            <th>Rating <?php echo $rating; ?></th>
        <?php endfor; ?>
    </tr>
    <?php foreach ($po_ratings as $column => $valueCounts) : ?>
        <tr>
            <td><?php echo $column; ?></td>
            <?php for ($rating = 1; $rating <= 5; $rating++) : ?>
                <td><?php echo $valueCounts[$rating]; ?></td>
            <?php endfor; ?>
        </tr>
    <?php endforeach; ?>
</table>

<!-- Display the value counts for columns pso1 and pso2 -->
<h2>Value Counts for Columns pso1 and pso2</h2>
<table border="1" align="center">
    <tr>
        <th>Column Name</th>
        <?php for ($rating = 1; $rating <= 5; $rating++) : ?>
            <th>Rating <?php echo $rating; ?></th>
        <?php endfor; ?>
    </tr>
    <?php foreach ($pso_ratings as $column => $valueCounts) : ?>
        <tr>
            <td><?php echo $column; ?></td>
            <?php for ($rating = 1; $rating <= 5; $rating++) : ?>
                <td><?php echo $valueCounts[$rating]; ?></td>
            <?php endfor; ?>
        </tr>
    <?php endforeach; ?>
</table>
