<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
include 'database.php';
$statement = $pdo->prepare("SELECT * FROM users WHERE USER_ID = $user_id");
if ($statement->execute()) {
    while ($row = $statement->fetch()) {
        echo '<div>'.'<h5>'. 'Username: '. $row['USERNAME'] .'</h5>'. '</div>';
        echo '<div>' . '<h5>'.'Vorname: '. $row['VORNAME'] . '</h5>'.'</div>';
        echo '<div>' . '<h5>'.'Nachname: '. $row['NACHNAME'] . '</h5>'.'</div>';
        echo '<div>'. '<h5>'.'Studiengang: ' . $row['STUDIENGANG'] . '</h5>'.'</div>';
        echo '<div>'. '<h5>'.'Email: ' . $row['EMAIL'] . '</h5>'.'</div>';
        echo '<div>' . '<h5>'.'Kürzel: '. $row['KUERZEL'] . '</h5>'.'</div>';
        echo '<div>'. '<h5>'.'Über mich: ' . $row['UEBER'] . '</h5>'.'</div>';
        echo '<br>';


        echo '<a class="btn btn-info" id="profile_change_button" href="update_profile.php">Profil bearbeiten</a>';

    }
}
?>