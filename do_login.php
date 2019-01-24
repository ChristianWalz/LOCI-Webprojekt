<?php
session_start();
include 'database.php';//die Datenbankverbindung wirder hergestellt

if(isset($_POST["Nutzername"]) AND isset($_POST["Passwort"]))//prüfen ob der User das Formular ausgefüllt hat
{
    $nutzername=$_POST["Nutzername"];
    $passwort=$_POST["Passwort"];
}
else
{
    echo"Keine Daten";
    die();
}
$statement = $pdo->prepare("SELECT * FROM users WHERE USERNAME=:nutzername AND PASSWORT=:passwort");// Daten aus der Datenbank werden ausgelesen
if($statement->execute(array(':nutzername'=>$nutzername, ':passwort'=>$passwort))) {
    if($row=$statement->fetch()) {
        //echo "angemeldet";
        $_SESSION["angemeldet"]=$row["USERNAME"];//falls der User mit den eingegebenen Daten gefunden wird, wird er angemeldet

    }
    else
    {
        echo"nicht berechtigt";  //falls der User mit den eingegebenen Daten nicht gefunden wird, kommt eine Meldung
    }

} else {
    echo "Datenbank-Fehler:";
    echo $statement->errorInfo()[2];
    echo $statement->queryString;
    die();
}
// UserID auslesen und in Session schreiben
$query =  $pdo->prepare ( "SELECT USER_ID FROM users WHERE USERNAME=:nutzername AND PASSWORT=:passwort");
$query->execute(array(':nutzername'=>$nutzername, ':passwort'=>$passwort));
$result = $query->fetch(  PDO::FETCH_ASSOC);
$user_id = $result ["USER_ID"];
$_SESSION['aktiveruser'] = $user_id;//wenn der User mit den angegebenen Daten gefunden wird, wird die Session gesetzt

// Username auslesen und in Session schreiben
$query =  $pdo->prepare ( "SELECT USERNAME FROM users WHERE USERNAME=:nutzername AND PASSWORT=:passwort");
$query->execute(array(':nutzername'=>$nutzername, ':passwort'=>$passwort));
$result2 = $query->fetch(  PDO::FETCH_ASSOC);
$nutzer_ausgelesen = $result2 ["USERNAME"];
$_SESSION['aktiveruser_name'] = $nutzer_ausgelesen;
//echo $user_id;

// Attribut auslesen und in Session schreiben
$query =  $pdo->prepare ( "SELECT STUDIENGANG FROM users WHERE USERNAME=:nutzername AND PASSWORT=:passwort");
$query->execute(array(':nutzername'=>$nutzername, ':passwort'=>$passwort));
$result3 = $query->fetch(  PDO::FETCH_ASSOC);
$studiengang_ausgelesen = $result3 ["USERNAME"];
$_SESSION['aktiveruser_name'] = $studiengang_ausgelesen;

if (isset($_POST['Login'])) {
    header('Location: main.php');//wenn man auf den Login-Button klickt, wird er auf profile.php weitergeleitet
} elseif (isset($_POST['Register'])) {
    header('Location: register.php');//wenn man auf den Registrierung-Button klickt, wird er auf registerphp weitergeleitet

} else {
    echo 'something went wrong';
    }

