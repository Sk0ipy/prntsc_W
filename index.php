<?php

// Include the database connection
include_once 'database_connection.php';

// get the urls from the database called working_urls
$sql = "SELECT * FROM working_urls";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);






?>


<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PrintScreen Saves</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>
<header>
    <nav class="navbar">
        <ul class="navbar-container">
            <li><a href="index.php">Home</a></li> <!--home-->
            <li><a href="#">Stats</a></li> <!--geeft de stats van bot, over hoe snel en hoeveel je alles heb-->
            <li><a href="#">Status</a></li> <!--geeft de status weer van de server, of de bot nog werkt-->
            <li><a href="#">Login/Register</a></li> <!--login en register-->
        </ul>
    </nav>

</header>
<main class="main">

    <div class="title">
        <h1>PrintScreen Saves</h1>
        <p>View random printscreens here!</p>
    </div>

    <!--4 boxes in the center of the screen-->
    <div class="container">
        <div class="box1"></div>
        <div class="box2"></div>
        <div class="box3"></div>
        <div class="box4"></div>
    </div>


<!--    button for refresh pics-->
    <div class="button">
        <button class="refresh_button" onclick="refresh_screens()">Refresh</button>
        <button class="check_screens" onclick="check_screens()">Check Screens</button>
    </div>


<!--    -->
</main>

<footer>

</footer>


</body>
</html>