<?php
session_start();

$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
$ueber=$_SESSION['uber_text'];
$studiengang_ausgelesen = $_SESSION ['aktiveruser_studi'];
if(isset($_SESSION['angemeldet'])) {
    echo 'Dies ist dein Profil.';
    echo "<br>";
    echo "<br>";
    echo $nutzer_ausgelesen.' '.$studiengang_ausgelesen.' '.$ueber;
    echo "<a href='bearbeiten.php'  >Profil bearbeiten</a>";
} else
{
    echo"Du bist nicht angemeldet.";
    die();
}
?>