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
    $text = $_POST["TEXT"];
    $user_id = $_SESSION['aktiveruser'];
    $nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
    echo $text;
    include 'database.php';
    $statement = $pdo->prepare("INSERT INTO posts (USERNAME, USER_ID, TEXT) VALUES (?,?,?)");
    $statement->execute(array($nutzer_ausgelesen, $user_id, $text));
    echo " id in der Datenbank: ".$id=$pdo->lastInsertId();
}
;