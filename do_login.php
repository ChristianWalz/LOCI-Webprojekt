<?php
session_start();


if(isset($_POST["Nutzername"]) AND isset($_POST["Passwort"]))
{
    $nutzername=$_POST["Nutzername"];
    $passwort=$_POST["Passwort"];
}
else
{
    echo"Keine Daten";
    die();
}
include 'database.php';



$statement = $pdo->prepare("SELECT * FROM users WHERE USERNAME=:nutzername AND PASSWORT=:passwort");

if($statement->execute(array(':nutzername'=>$nutzername, ':passwort'=>$passwort))) {
    if($row=$statement->fetch()) {
        //echo "angemeldet";
        $_SESSION["angemeldet"]=$row["USERNAME"];



    }  
    else
    {
        echo"nicht berechtigt";
    }
} else {
    echo "Datenbank-Fehler:";
    echo $statement->errorInfo()[2];
    echo $statement->queryString;
    die();
}
$query =  $pdo->prepare ( "SELECT USER_ID FROM users WHERE USERNAME=:nutzername AND PASSWORT=:passwort");
$query->execute(array(':nutzername'=>$nutzername, ':passwort'=>$passwort));
$result = $query->fetch(  PDO::FETCH_ASSOC);
$user_id = $result ["USER_ID"];

$_SESSION['aktiveruser'] = $user_id;
//echo $user_id;

// header('Location: index.php');
