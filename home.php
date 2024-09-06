<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }

        form {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #e0eba5;
        }

        p {
            margin: 5px;
        }

        /* Additional styling for headings */
        h1 {
            color: #4CAF50;
        }

        .heading {
            color: #82f36b;
        }

        h2 {
            color: #555;
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
                <li class="active"><a href="home.html">Home </a></li>
                <li><a href="admin.php">Rating Count</a></li>
                <li><a href="avg.php">Avg Ratings</a></li>
                <li><a href="feedback.php">Student feedback</a></li>
            </ul>
        </div>
    </nav>
    <body align="center">
        <div class="center">

            <form method="post" action="">

                <h1>Branch :
                    <select name="branch" id="branch">
                        <option value="MEC">MEC</option>
                        <option value="CSE">CSE</option>
                        <option value="ECE">ECE</option>
                        <option value="EEE">EEE</option>
                        <option value="MBA">MBA</option>
                    </select>
                </h1><br>
                <h1>Year :
                    <select name="year" id="year">
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                    </select>
                </h1><br>
                <h1> <input type="submit" value="submit" name="submit"></h1>
            </form>
        </div>
    </body>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $branch = $_POST['branch'];
    $year = $_POST['year'];

    if ($branch === 'MEC' && $year === '2023') {
        // Redirect to MEC.php
        header("Location: mec2023.php");
        exit();
    } elseif ($branch === 'ECE' && $year === '2023') {
        // Redirect to ECE.php
        header("Location: ece2023.php");
        exit();
    } else {
        // Handle other cases or provide a default redirection here
        header("Location: default.php");
        exit();
    }
}
?>
