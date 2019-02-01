<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
if(isset($_SESSION['angemeldet'])) {
    echo 'Hier siehst du alle Veranstaltungen.';

    $content = $_POST["content"];
    echo $content;
    include 'database.php';

    //auslesen der tabelle veranstaltungen
    $statement = $pdo->prepare("SELECT * FROM veranstaltungen ORDER BY VER_ID DESC");
    if ($statement->execute()) {
        while ($row = $statement->fetch()) {
            //darstellung aller veranstaltungen
            echo '<div class="container">';
            echo '<div class="row">';
            echo '<div class="col-sm-3">';

            echo '</div>';
            echo '<div class="col-sm-9">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . 'Was: '. $row['WAS'] . '</h5>';
            echo '<p class="card-text">' . 'Wann: '. $row['WANN'] . '</p>';
            echo '<p class="card-text">' . 'Wo: '. $row['WO'] . '</p>';
            echo '<p class="card-text">' . 'von wem: '. $row['ERSTELLER'] . '</p>';
            echo '<br>';
            echo "<a href=\"do_veran_follow.php?id=" . $row['VER_ID'] . "\" style='position: absolute;right: 1em; bottom: 6px; '>Teilnehmen</a>";
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
}
?>
