<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
$id_fremd = $_GET['id'];  //Zieht den Parameter aus der URL
include 'database.php';


$statement = $pdo->prepare("SELECT * FROM users WHERE USER_ID = $id_fremd");
if ($statement->execute()) {
    while ($row = $statement->fetch()) {

        echo '<div class="col-sm-3">';
        // get user image and show it
        $userId = $row['USER_ID'];
        $sql = "SELECT filename FROM profileimg WHERE USER_ID = $userId";
        $foundProfileImage = $pdo->query($sql)->fetch();
        if ($foundProfileImage) {
            // if image found show image
            $profileImagePath = $foundProfileImage['filename'];
        } else {
            // if no image found user default image
            $profileImagePath = "bilder/default-user-profile-picture-3.png";
        }
        echo '<img class="post_img" src="' . $profileImagePath . '"/>';
        echo '</div>';

        echo '<div>'.'<h5>'. 'Username: '. $row['USERNAME'] .'</h5>'. '</div>';
        echo '<div>' . '<h5>'.'Vorname: '. $row['VORNAME'] . '</h5>'.'</div>';
        echo '<div>' . '<h5>'.'Nachname: '. $row['NACHNAME'] . '</h5>'.'</div>';
        echo '<div>'. '<h5>'.'Studiengang: ' . $row['STUDIENGANG'] . '</h5>'.'</div>';
        echo '<div>'. '<h5>'.'Email: ' . $row['EMAIL'] . '</h5>'.'</div>';
        echo '<div>' . '<h5>'.'Kürzel: '. $row['KUERZEL'] . '</h5>'.'</div>';
        echo '<div>'. '<h5>'.'Über mich: ' . $row['UEBER'] . '</h5>'.'</div>';


    }
}
echo "<a href=\"do_follow.php?id=".$id_fremd."\" style='position: absolute;right: 1em; bottom: 5%; '>Folgen</a>";
echo '<br>';
echo "<a href=\"do_unfollow.php?id=".$id_fremd."\" style='position: absolute;right: 1em; bottom: 0%; '>Entolgen</a>";
?>