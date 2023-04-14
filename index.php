<?php
// connect to your database using PDO
$dsn = 'mysql:host=localhost;dbname=prntsc_db';
$username = 'root';
$password = '';
$pdo = new PDO($dsn, $username, $password);

// check if urls table exists and has data
$working_urls_db = "SELECT COUNT(*) as total_urls FROM working_urls";
$working_urls_result = $pdo->query($working_urls_db);
$working_urls_data = $working_urls_result->fetch(PDO::FETCH_ASSOC);
$total_working_urls = $working_urls_data['total_urls'] ?? 0;

// select four random URLs from the database
$random_urls_db = "SELECT url FROM working_urls ORDER BY RAND() LIMIT 4";
$random_urls_result = $pdo->query($random_urls_db);
$random_urls_data = $random_urls_result->fetchAll(PDO::FETCH_ASSOC);
$random_urls = array_column($random_urls_data, 'url');
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
            <li><a href="stats.php">Stats</a></li> <!--geeft de stats van bot, over hoe snel en hoeveel je alles heb-->
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
        <div class="box1"><img class="img" src="<?php echo $random_urls[0]; ?>" id="myImg1" onclick="enlargeImage(this)"></div>
        <div class="box2"><img class="img" src="<?php echo $random_urls[1]; ?>" id="myImg2" onclick="enlargeImage(this)"></div>
        <div class="box3"><img class="img" src="<?php echo $random_urls[2]; ?>" id="myImg3" onclick="enlargeImage(this)"></div>
        <div class="box4"><img class="img" src="<?php echo $random_urls[3]; ?>" id="myImg4" onclick="enlargeImage(this)"></div>

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
<script>
    function enlargeImage(img) {
    //     get the image and insert it inside the modal - use its "alt" text as a caption
        var modalImg = document.getElementById("expandedImg");
        var captionText = document.getElementById("imgText");
        modalImg.src = img.src;
        captionText.innerHTML = img.alt;
        modalImg.style.display = "block";
        captionText.style.display = "block";


    }







    function refresh_screens() {
        location.reload();
    }

</script>

</body>
</html>
