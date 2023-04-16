<?php

global $pdo, $urls, $nsfw, $sfw, $working_urls;
include "get_database_pics.php";

// total number of generated urls in the database
$total_urls = count($urls);

// total number of working urls in the database is nsfw + sfw
$total_working_urls = count($nsfw) + count($sfw);

// total number of nsfw images in the database
$total_nsfw = count($nsfw);

// total number of sfw images in the database
$total_sfw = count($sfw);

// percentage of working urls
$percentage_working_urls = round($total_working_urls / $total_urls * 100);

// percentage of nsfw images
$percentage_nsfw = round($total_nsfw / $total_working_urls * 100);

// percentage of sfw images
$percentage_sfw = round($total_sfw / $total_working_urls * 100);


?>
<html lang='nl'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Stats</title>
    <link rel='stylesheet' href='css/style_stats.css'>
    <script src='js/script_stats.js'></script>
</head>
<body>
<header>
    <nav class='navbar'>
        <ul class='navbar-container'>
            <li><a href='index.php'>Home</a></li> <!--home-->
            <li><a href='stats.php'>Stats</a></li> <!--geeft de stats van bot, over hoe snel en hoeveel je alles heb-->
            <li><a href='#'>Login/Register</a></li> <!--login en register-->
        </ul>
    </nav>

</header>
<main class='main'>

    <div class="countdown">
        <p>Page will refresh in <span id="countdown"></span> seconds</p>
    </div>
    <h1>Statistics</h1>
    <div class='stats-container'>
        <div class='stats'>
            <h2>Generated urls</h2>
            <p><?php echo $total_urls; ?></p>
        </div>
        <div class='stats'>
            <h2>Working urls</h2>
            <p><?php echo $total_working_urls; ?></p>
        </div>
        <div class='stats'>
            <h2>NSFW images</h2>
            <p><?php echo $total_nsfw; ?></p>
        </div>
        <div class='stats'>
            <h2>SFW images</h2>
            <p><?php echo $total_sfw; ?></p>
        </div>
        <div class='stats'>
            <h2>Percentage working urls</h2>
            <p><?php echo $percentage_working_urls; ?>%</p>
        </div>
        <div class='stats'>
            <h2>Percentage NSFW images</h2>
            <p><?php echo $percentage_nsfw; ?>%</p>
        </div>
        <div class='stats'>
            <h2>Percentage SFW images</h2>
            <p><?php echo $percentage_sfw; ?>%</p>
        </div>
    </div>

    <footer>
        <div class="disclaimer">
            <p>Disclaimer: The data is not 100% accurate, because the bot is still in development.</p>
            <p>Not all the pictures are checked on if they are sfw or nsfw</p>

        </div>
    </footer>
</main>

<script>
    // set the countdown time in seconds
    var countdownTime = 5;

    // get the countdown element by its ID
    var countdownElement = document.getElementById("countdown");

    // set the initial value of the countdown element
    countdownElement.innerHTML = countdownTime;

    // create a function that updates the countdown timer and refreshes the page
    function countdown() {
        // decrement the countdown time
        countdownTime--;

        // update the countdown element with the new value
        countdownElement.innerHTML = countdownTime;

        // if the countdown time has reached 0, refresh the page
        if (countdownTime <= 0) {
            location.reload();
        }
    }

    // call the countdown function every second using setInterval()
    setInterval(countdown, 1000);


</script>
</body>
</html>