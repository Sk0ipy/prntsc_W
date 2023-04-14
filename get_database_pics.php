<?php
// connect to your database using PDO
$dsn = 'mysql:host=localhost;dbname=prntsc_db';
$username = 'root';
$password = '';
$pdo = new PDO($dsn, $username, $password);

#print all the tables in de prntsc_db database
$statement = $pdo->query("SHOW TABLES");
$tables = $statement->fetchAll(PDO::FETCH_COLUMN);

# get data in the tables
$nsfw = $pdo->query("SELECT * FROM nsfw");
$nsfw = $nsfw->fetchAll(PDO::FETCH_ASSOC);

$sfw = $pdo->query("SELECT * FROM sfw");
$sfw = $sfw->fetchAll(PDO::FETCH_ASSOC);

$urls = $pdo->query("SELECT * FROM urls");
$urls = $urls->fetchAll(PDO::FETCH_ASSOC);

$working_urls = $pdo->query("SELECT * FROM working_urls");
$working_urls = $working_urls->fetchAll(PDO::FETCH_ASSOC);
