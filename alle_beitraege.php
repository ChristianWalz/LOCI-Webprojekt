<?php
session_start();

$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
if(isset($_SESSION['angemeldet']))
{
   /* echo 'Nutzer mit der Nummer '. $user_id; echo 'ist angemeldet.'; */
    echo 'Hallo '. $nutzer_ausgelesen; echo '  wie geht es Dir?';
}
else
{
    echo"Du bist nicht angemeldet.";
    die();
}
echo"<br>";
echo"<br>";
$content= $_POST["content"];
echo $content;
include 'database.php';
$statement = $pdo->prepare("SELECT * FROM posts");
if($statement->execute()) {
    while($row=$statement->fetch()) {
        echo $row['POST_ID']." ".$row['TEXT']." ".$row['USERNAME']." ".$row['USER_ID'];
        echo "<a href=\"profil_fremd.php?id=".$row['USER_ID']."\">Zum Profil</a>";
        echo "<a href=\"edit.php?id=".$row['POST_ID']."\">EDIT</a>";
        echo "<br>";
    }
} else {
    echo "Datenbank-Fehler:";
    echo $statement->errorInfo()[2];
    echo $statement->queryString;
    die();
}
?>
