<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
if(isset($_SESSION['angemeldet'])) {
    echo '<h4 style="margin-left: 15%; font-size:20px; font-weight: bolder;">Hier siehst du deine Veranstaltungen. </h4>';

    $content = $_POST["content"];
    echo $content;
    include 'database.php';
    $statement = $pdo->prepare("SELECT * FROM veranstaltungen v, veranstaltungfollowlist f WHERE v.VER_ID=f.VER_ID AND
    f.USER_ID='$user_id'");
    if ($statement->execute()) {
        while ($row = $statement->fetch()) {
            echo '<div class="container">';
            echo '<div class="row">';
            echo '<div class="col-sm-3">';

            echo '</div>';
            echo '<div class="col-sm-9">';
            echo '<div class="card" style="border: none !important; background-color: #e1e2e3 !important;">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . 'Was: '. $row['WAS'] . '</h5>';
            echo '<p class="card-text">' . 'Wann: '. $row['WANN'] . '</p>';
            echo '<p class="card-text">' . 'Wo: '. $row['WO'] . '</p>';
            echo '<p class="card-text">' . 'von wem: '. $row['ERSTELLER'] . '</p>';
            echo '<br>';
            echo "<a href=\"do_veran_unfollow.php?id=" . $row['VER_ID'] . "\" style='position: absolute;right: 1em; bottom: 6px; '>Nicht mehr teilnehmen</a>";
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
}
?>
