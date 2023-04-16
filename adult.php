<?php
global $nsfw;
include "get_database_pics.php";

$nsfw = array_column($nsfw, 'url');
shuffle($nsfw);


?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PrintScreen Saves</title>
    <link rel="stylesheet" href="css/style_index.css">

    <script src="js/script_index.js"></script>
</head>
<body>
<header>
    <nav class="navbar">
        <ul class="navbar-container">
            <li><a href="index.php">Home</a></li> <!--home-->
            <li><a href="stats.php">Stats</a></li> <!--geeft de stats van bot, over hoe snel en hoeveel je alles heb-->
            <li><a href="age-verification-popup.html">Adult</a></li>
        </ul>
    </nav>
</header>
<main class="main">
    <div class="title">
        <h1>Adult printscreens</h1>
        <p>View adult printscreens here!</p>
    </div>


    <!--4 boxes in the center of the screen-->
    <div class="container">

        <div class="box1"><img class="img" src="<?php echo $nsfw[0]; ?>" id="myImg1" onclick="enlargeImage(this)"></div>
        <div class="box2"><img class="img" src="<?php echo $nsfw[1]; ?>" id="myImg2" onclick="enlargeImage(this)"></div>
        <div class="box3"><img class="img" src="<?php echo $nsfw[2]; ?>" id="myImg3" onclick="enlargeImage(this)"></div>
        <div class="box4"><img class="img" src="<?php echo $nsfw[3]; ?>" id="myImg4" onclick="enlargeImage(this)"></div>
    </div>

    <div class="enlarged-image-container">
        <img id="expandedImg" onclick="enlargeImage(this)" style="display:none">
        <p id="imgText" style="display:none"></p>
    </div>

    <!-- button for refresh pics -->
    <div class="button">
        <button class="refresh_button" onclick="refresh_screens()">Refresh</button>
    </div>
</main>
<footer>
</footer>
</body>
</html>

