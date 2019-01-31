<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
if(isset($_SESSION['angemeldet'])) {
echo 'Hier siehst du alle Mitglieder.';

$content = $_POST["content"];
echo $content;
include 'database.php';
$statement = $pdo->prepare("SELECT * FROM posts ORDER BY POST_ID DESC");
if ($statement->execute()) {
    while ($row = $statement->fetch()) {
        echo '<div class="container">';
        echo '<div class="row">';
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
        echo '<div class="col-sm-9">';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['USERNAME'] . '</h5>';
        echo '<p class="card-text">' . $row['STUDIENGANG'] . '</p>';
        echo '<p class="card-text">' . $row['UEBER'] . '</p>';
        echo "<a   href=\"profil_fremd_main.php?id=" . $row['USER_ID'] . "\" style='position: absolute;right: 1em; bottom: 6px; ' >Zum Profil</a>";
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

    }
}
else {
    echo"Du bist nicht angemeldet.";
    die();
}
}
?>