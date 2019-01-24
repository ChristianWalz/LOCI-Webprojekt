<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
if(isset($_SESSION['angemeldet'])) {
    echo 'Hier siehst du alle Mitglieder.' ;
    echo "<br>";
    echo "<br>";
    $content = $_POST["content"];
    echo $content;
    include 'database.php';
    $statement = $pdo->prepare("SELECT USER_ID, USERNAME, STUDIENGANG, UEBER FROM users");
    if ($statement->execute()) {
        while ($row = $statement->fetch()) {
            echo $row['USERNAME'] . " " . $row['STUDIENGANG'] . " " . $row['UEBER'];
            echo "<a href=\"profil_fremd.php?id=" . $row['USER_ID'] . "\">Zum Profil</a>";
            echo "<br>";
        }
    }
}
else
{
    echo"Du bist nicht angemeldet.";
    die();
}
?>
