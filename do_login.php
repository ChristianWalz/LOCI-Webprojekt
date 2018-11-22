<?php
session_start();


if(isset($_POST["Nutzername"]) AND isset($_POST["Passwort"]))
{
    $username=$_POST["Nutzername"];
    $passwort=$_POST["Passwort"];
}
else
{
    echo"Keine Daten";
    die();
}
include 'database.php';



$statement = $pdo->prepare("SELECT * FROM users WHERE username=:username AND passwort=:passwort");

if($statement->execute(array(':Nutzername'=>$username, ':Passwort'=>$passwort))) {
    if($row=$statement->fetch()) {
        //echo "angemeldet";
        $_SESSION["angemeldet"]=$row["username"];
        header('Location: index.php');
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
