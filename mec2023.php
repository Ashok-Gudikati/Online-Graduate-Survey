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

// Define the branch and year values
$branch = "MEC";
$year = "2023";

// SQL query to select all columns for students from the "survey" table where branch is "EEE" and year is "2023"
$sql = "SELECT * FROM survey WHERE branch = '$branch' AND year = '$year'";

// Execute the SQL query
$result = $conn->query($sql);

// Check if any rows were found
if ($result->num_rows > 0) {
    // Output the table header
    echo "<h1 align=center style=color:#4CAF50;> Mechanical Engineering-2023</h1>";

    echo "<table border='1' align=center>";
    echo "<tr>
            <th>Name</th><th>Roll No</th><th>GRADUATED YEAR</th><th>DATE</th><th>PROGRAM OF STUDY</th><th>BRANCH</th>
            <th style='text-align:center;'>p1</th><th style='text-align:center;'>p2</th><th style='text-align:center;'>p3</th>
            <th style='text-align:center;'>p4</th><th style='text-align:center;'>p5</th><th style='text-align:center;'>p6</th>
            <th style='text-align:center;'>p7</th><th style='text-align:center;'>p8</th>
            <th>occupation</th>
            <th style='text-align:center;'>po1</th><th style='text-align:center;'>po2</th><th style='text-align:center;'>po3</th>
            <th style='text-align:center;'>po4</th><th style='text-align:center;'>po5</th><th style='text-align:center;'>po6</th>
            <th style='text-align:center;'>po7</th><th style='text-align:center;'>po8</th>
            <th style='text-align:center;'>po9</th><th style='text-align:center;'>po10</th>
            <th style='text-align:center;'>po11</th><th style='text-align:center;'>po12</th>
            <th style='text-align:center;'>pso1</th><th style='text-align:center;'>pso2</th>
            <th>feedback</th>
          </tr>";

    // Loop through the results and display each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['roll'] . "</td>";
        echo "<td>" . $row['year'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['program'] . "</td>";
        echo "<td>" . $row['branch'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['p1'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['p2'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['p3'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['p4'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['p5'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['p6'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['p7'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['p8'] . "</td>";
        echo "<td>" . $row['occupation'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['po1'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['po2'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['po3'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['po4'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['po5'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['po6'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['po7'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['po8'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['po9'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['po10'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['po11'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['po12'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['pso1'] . "</td>";
        echo "<td style='text-align:center;'>" . $row['pso2'] . "</td>";
        echo "<td>" . $row['feedback'] . "</td>";
        // Add more columns as needed using $row['column_name']
        echo "</tr>";
    }

    // Close the table
    echo "</table>";
} else {
    echo "<h1 align=center style=color:#4CAF50;>No records found for branch '$branch' and year '$year'.</h1>";
}

// Close the database connection
$conn->close();
?>
