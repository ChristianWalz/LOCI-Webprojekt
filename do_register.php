
<?php
session_start();
include 'database.php';
if(isset($_POST["Username"]) AND isset($_POST["Passwort"]) AND isset($_POST["Studiengang"]) AND isset($_POST["Vorname"])AND isset($_POST["Nachname"])AND isset($_POST["Kuerzel"])AND isset($_POST["Email"]))

    //es wird überprüft ob der User die Felder ausgefüllt hat
{
    $nachname=$_POST ["Nachname"];
    $vorname=$_POST ["Vorname"];
    $kuerzel=$_POST ["Kuerzel"];
    $username=$_POST["Username"];//Werte des Formulars werden den Variablen zugewiesen
    $passwort=$_POST["Passwort"];
    $studiengang=$_POST["Studiengang"];
    $email=$_POST ['Email'];


}
else
{
    echo"Bitte alles ausfüllen!";
    die();
}
$statement = $pdo->prepare("INSERT INTO users (NACHNAME, VORNAME, KUERZEL, USERNAME, PASSWORT, STUDIENGANG, EMAIL) VALUES (?,?,?,?,?,?,?)");
$success = $statement->execute(array($nachname, $vorname, $kuerzel, $username, $passwort, $studiengang, $email));//die angegebenen Daten werden in die Datenbank geschrieben

if ($success) {
    echo "Du wurdest erfolgreich registriert!";
    header("Location:index.php");


} else {
    echo "Die Registrierung hat nicht geklappt! :(";
}
?>


