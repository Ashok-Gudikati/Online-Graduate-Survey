<?php
// Replace these variables with your database credentials
$host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'ashok';

// Establish the database connection
$conn = new mysqli($host, $db_user, $db_password, $db_name);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitizeInput($input)
{
    return htmlspecialchars(stripslashes(trim($input)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize the form data
    $name = sanitizeInput($_POST['name']);
    $roll = sanitizeInput($_POST['roll']);
    $year = sanitizeInput($_POST['year']);
    $date = sanitizeInput($_POST['date']);
    $program = sanitizeInput($_POST['program']);
    $branch = sanitizeInput($_POST['branch']);
    $p1 = sanitizeInput($_POST['p1']);
    $p2 = sanitizeInput($_POST['p2']);
    $p3 = isset($_POST['p3']) ? sanitizeInput($_POST['p3']) : '';
    $p4 = isset($_POST['p4']) ? sanitizeInput($_POST['p4']) : '';
    $p5 = isset($_POST['p5']) ? sanitizeInput($_POST['p5']) : '';
    $p6 = isset($_POST['p6']) ? sanitizeInput($_POST['p6']) : '';
    $p7 = isset($_POST['p7']) ? sanitizeInput($_POST['p7']) : '';
    $p8 = isset($_POST['p8']) ? sanitizeInput($_POST['p8']) : '';
    $occupation = sanitizeInput($_POST['occupation']);

    $po1 = isset($_POST['po1']) ? sanitizeInput($_POST['po1']) : '';
    $po2 = isset($_POST['po2']) ? sanitizeInput($_POST['po2']) : '';
    $po3 = isset($_POST['po3']) ? sanitizeInput($_POST['po3']) : '';
    $po4 = isset($_POST['po4']) ? sanitizeInput($_POST['po4']) : '';
    $po5 = isset($_POST['po5']) ? sanitizeInput($_POST['po5']) : '';
    $po6 = isset($_POST['po6']) ? sanitizeInput($_POST['po6']) : '';
    $po7 = isset($_POST['po7']) ? sanitizeInput($_POST['po7']) : '';
    $po8 = isset($_POST['po8']) ? sanitizeInput($_POST['po8']) : '';
    $po9 = isset($_POST['po9']) ? sanitizeInput($_POST['po9']) : '';
    $po10 = isset($_POST['po10']) ? sanitizeInput($_POST['po10']) : '';
    $po11 = isset($_POST['po11']) ? sanitizeInput($_POST['po11']) : '';
    $po12 = isset($_POST['po12']) ? sanitizeInput($_POST['po12']) : '';
    $pso1 = isset($_POST['pso1']) ? sanitizeInput($_POST['pso1']) : '';
    $pso2 = isset($_POST['pso2']) ? sanitizeInput($_POST['pso2']) : '';
    $feedback = sanitizeInput($_POST['feedback']);

    // SQL query to insert data into the database
    $sql = "INSERT INTO survey (name, roll, year, date, program, branch, p1, p2, p3, p4, p5, p6, p7, p8, occupation,
    po1,po2,po3,po4,po5,po6,po7,po8, po9, po10, po11, po12, pso1, pso2, feedback)
            VALUES ('$name', '$roll', '$year', '$date', '$program', '$branch', '$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$p7', '$p8','$occupation',
            '$po1','$po2','$po3','$po4','$po5','$po6','$po7','$po8', '$po9', '$po10', '$po11', '$po12', '$pso1', '$pso2', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        // Success message
        echo '<script>alert("Your records have been recorded!!");</script>';
    } else {
        // Error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
