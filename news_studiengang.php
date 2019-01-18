<?php
session_start();

$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
$studiengang_ausgelesen = $_SESSION ['aktiveruser_name'];


echo "<br>";
echo "<br>";
$content = $_POST["content"];
echo $content;
include 'database.php';
$statement = $pdo->prepare("SELECT INHALT FROM news WHERE ATTRIBUT =:studiengang_ausgelesen");
if($statement->execute()) {
    while ($row = $statement->fetch()) {
        echo $row['INHALT'];

        echo "<br>";
    }
}
?>