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
    echo $text;

    include 'database.php';


    $statement = $pdo->prepare("INSERT INTO posts (TEXT, USER_ID) VALUES (?,?) ");
    $statement->execute(array($text));
    echo "id in der Datenbank: ".$id=$pdo->lastInsertId();
}

;