<?php

$birthdate = $_POST['birthdate'];
$min_age = 18;
print $birthdate;
$birthdate = strtotime($birthdate);
$age = (time() - $birthdate) / (60 * 60 * 24 * 365.25);
if ($age < $min_age) {
    echo "You are not old enough to view this content.";
//    after 5 seconds the user will be redirected to the index page
    header("refresh:5;url=index.php");
} else {
    header("Location: adult.php");
}

?>
