<?php

global $pdo;
include "get_database_pics.php";

// check if urls table exists and has data
$urls_db = "SELECT COUNT(*) as total_urls FROM urls";
$urls_result = $pdo->query($urls_db);
$urls_data = $urls_result->fetch(PDO::FETCH_ASSOC);
$total_urls = $urls_data['total_urls'] ?? 0;

// check if working_urls table exists and has data
$working_db = "SELECT COUNT(*) as total_working_urls FROM working_urls";
$working_result = $pdo->query($working_db);
$working_data = $working_result->fetch(PDO::FETCH_ASSOC);
$total_working_urls = $working_data['total_working_urls'] ?? 0;

// check if urls table exists and has data
$urls_db = "SELECT COUNT(*) as total_urls FROM urls";
$urls_result = $pdo->query($urls_db);
$urls_data = $urls_result->fetch(PDO::FETCH_ASSOC);


// calculate the next refresh time
$next_refresh_time = time() + 60; // current time + 1 minutes

// output the data as HTML
?>
<html lang='nl'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>PrintScreen Saves</title>
    <link rel='stylesheet' href='css/style_stats.css'>
    <script src='js/script_stats.js'></script>
</head>
<body>
<header>
    <nav class='navbar'>
        <ul class='navbar-container'>
            <li><a href='index.php'>Home</a></li> <!--home-->
            <li><a href='stats.php'>Stats</a></li> <!--geeft de stats van bot, over hoe snel en hoeveel je alles heb-->
            <li><a href='#'>Status</a></li> <!--geeft de status weer van de server, of de bot nog werkt-->
            <li><a href='#'>Login/Register</a></li> <!--login en register-->
        </ul>
    </nav>

</header>
<main class='main'>
    <h1>Statistics</h1>
    <table>
        <tr>
            <th>Total URLs saved</th>
            <td><?php echo $urls_data['total_urls'] ?></td>
        </tr>
        <tr>
            <th>Total working URLs</th>
            <td><?php echo $working_data['total_working_urls'] ?></td>
        </tr>
    </table>
    <p id='countdown' class="countdown"></p>
</main>

<footer>

</footer>

<script>
    // function to update the countdown and refresh the page when it reaches 0
    function updateCountdown() {
        // calculate the number of seconds left
        var seconds = <?php echo $next_refresh_time?> -Math.floor(Date.now() / 1000);

        // update the countdown element with the number of seconds left
        document.getElementById('countdown').innerHTML = 'Refreshing in ' + seconds + ' seconds';

        // refresh the page when the countdown reaches 0
        if (seconds <= 0) {
            location.reload();
        }

        // refresh the countdown every second
        setTimeout(updateCountdown, 1000);
    }

    // call the countdown function and refresh the data every refresh_interval seconds
    updateCountdown();
    let $refresh_interval = 60;
    setInterval(function () {
        // perform your SQL queries to get data from the database
        var urls_db = 'SELECT COUNT(*) as total_urls FROM urls';
        var working_db = 'SELECT COUNT(*) as total_working_urls FROM working_urls';

        // fetch the data from the database using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_stats.php?urls=' + urls_db + '&working=' + working_db);
        xhr.onload = function () {
            // update the table with the fetched data
            var stats = JSON.parse(xhr.responseText);
            document.getElementById('total_urls').innerHTML = stats.total_urls;
            document.getElementById('total_working_urls').innerHTML = stats.total_working_urls;
        }
        xhr.send();
    }, $refresh_interval * 1000);
</script>

</body>
</html>";

