<?php
/*session_start(); */

session_start();
include 'database.php';

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


// UserID auslesen und in Session schreiben
$query =  $pdo->prepare ( "SELECT USER_ID FROM users WHERE USERNAME=:nutzername AND PASSWORT=:passwort");
$query->execute(array(':nutzername'=>$nutzername, ':passwort'=>$passwort));
$result = $query->fetch(  PDO::FETCH_ASSOC);
$user_id = $result ["USER_ID"];
$_SESSION['aktiveruser'] = $user_id;


// Username auslesen und in Session schreiben
$query =  $pdo->prepare ( "SELECT USERNAME FROM users WHERE USERNAME=:nutzername AND PASSWORT=:passwort");
$query->execute(array(':nutzername'=>$nutzername, ':passwort'=>$passwort));
$result2 = $query->fetch(  PDO::FETCH_ASSOC);
$nutzer_ausgelesen = $result2 ["USERNAME"];
$_SESSION['aktiveruser_name'] = $nutzer_ausgelesen;

// Attribut Studiengang auslesen und in Session schreiben
$query =  $pdo->prepare ( "SELECT STUDIENGANG FROM users WHERE USERNAME=:nutzername AND PASSWORT=:passwort");
$query->execute(array(':nutzername'=>$nutzername, ':passwort'=>$passwort));
$result3 = $query->fetch(  PDO::FETCH_ASSOC);
$studiengang_ausgelesen = $result3 ["STUDIENGANG"];
$_SESSION['aktiveruser_studi'] = $studiengang_ausgelesen;


// Über Text auslesen und in Session schreiben
$query =  $pdo->prepare ( "SELECT UEBER FROM users WHERE USERNAME=:nutzername AND PASSWORT=:passwort");
$query->execute(array(':nutzername'=>$nutzername, ':passwort'=>$passwort));
$result4 = $query->fetch(  PDO::FETCH_ASSOC);
$ueber = $result4 ["UEBER"];
$_SESSION['uber_text'] = $ueber;


//echo $ueber;

/* $create = $pdo->prepare ("CREATE TABLE IF NOT EXISTS 'folgen_' ('NUTZER' INT ENGINE=INNODB");
$create-> execute () ;
*/

header('Location: main.php');

/*  if (isset($_POST['Login'])) {
    header('Location: profile.php');
} elseif (isset($_POST['Register'])) {
    header('Location: register.php');
} else {
    echo 'something went wrong';
}
*/

