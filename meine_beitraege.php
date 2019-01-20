<?php
session_start();

$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
if(isset($_SESSION['angemeldet'])) {
    echo 'Hier siehst du deine eigenen Beiträge.' ;
    echo "<br>";
    echo "<br>";
    $content = $_POST["content"];
    echo $content;
    include 'database.php';
    $statement = $pdo->prepare("SELECT * FROM posts WHERE USER_ID='$user_id'");
    if ($statement->execute()) {
        while ($row = $statement->fetch()) {
            echo $row['POST_ID'] . " " . $row['TEXT'] . " " . $row['USERNAME'] . " " . $row['USER_ID'];


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
