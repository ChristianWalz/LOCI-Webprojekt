<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
if(!isset($_SESSION["angemeldet"]))
{
    echo"nicht angemeldet.";
    die();
}
{
    //variable aus POST ausgelesen, dienen zum eintagen in datenbank
    $text = $_POST["WAS"];
    $zeit = $_POST['WANN'];
    $ort = $_POST['WO'];

    include 'database.php';
    //daten werden in datenbank geschrieben
    $statement = $pdo->prepare("INSERT INTO veranstaltungen (WAS, WANN, WO, ERSTELLER) VALUES (?,?,?,?)");
    $statement->execute(array($text, $zeit, $ort, $nutzer_ausgelesen ));
    //echo " id in der Datenbank: ".$id=$pdo->lastInsertId();
    header("Location: veranstaltungen_main.php");
}
;