<?php
session_start();
include 'header.html';
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
$ueber=$_SESSION['uber_text'];
$studiengang_ausgelesen = $_SESSION ['aktiveruser_studi'];
$email_ausgelesen = $_SESSION ['aktiveruser_']:
if(isset($_SESSION['angemeldet'])) {
    echo 'Dies ist dein Profil.';
    echo "<br>";
    echo "<br>";
    echo $nutzer_ausgelesen.' '.$studiengang_ausgelesen.' '.$ueber;
    echo "<a href='update_profile.php'  >Profil bearbeiten</a>";//da muss noch das Bildupload rein
} else
{
    echo"Du bist nicht angemeldet.";
    die();
}

?>