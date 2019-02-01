
<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
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
    $ueber=$_POST ['Ueber'];


}
else
{
    echo"Bitte alles ausfüllen!";
    die();
} //überschreibt variablen in der datenbank an der stelle wo die user id die des nutzers ist
$statement = $pdo->prepare("UPDATE users SET NACHNAME='$nachname', VORNAME='$vorname', KUERZEL='$kuerzel', USERNAME='$username', PASSWORT='$passwort', STUDIENGANG='$studiengang', EMAIL='$email', UEBER='$ueber' WHERE USER_ID='$user_id' ");
$success = $statement->execute(array($nachname, $vorname, $kuerzel, $username, $passwort, $studiengang, $email, $ueber));//die angegebenen Daten werden in die Datenbank geschrieben

if ($success) {
    echo "Du wurdest erfolgreich registriert!";
    header("Location: meinprofil_main.php");


} else {
    echo "Die Registrierung hat nicht geklappt! :(";
}
?>


