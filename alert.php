<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$anzahl_alt = $_SESSION['anzahl_alt'];

include 'database.php';//enthält die Daten zur Verbindungsherstellung mit der Datenbank

// Anzahl der verfolgten Beiträge auslesen und in Variable schreiben i

$anzahl_neu = $pdo->query("select count(*) from posts p, following f WHERE p.USER_ID=f.FOLLOWER_ID AND
    f.USER_ID='$user_id'")->fetchColumn();
//echo $anzahl_neu;
//echo "<br>";

if ($anzahl_alt < $anzahl_neu) {

    $message = "Es gibt neue Posts verfolgter Nutzer!";
    echo "<script type='text/javascript'>alert('$message');</script>";
//popup einbauen
    echo '<br>';
    echo '<br>';

    $_SESSION['anzahl_alt'] = $anzahl_neu;
}
else {
    $_SESSION['anzahl_alt'] = $anzahl_neu;
}


?>