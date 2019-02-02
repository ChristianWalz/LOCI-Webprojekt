<?php
session_start();
include 'database.php';

$actualUser = $_SESSION['aktiveruser'];

if ($actualUser) {
    // Profilbild suchen
    $sql = "SELECT filename FROM profileimg WHERE USER_ID = $actualUser";
    $foundProfileImage = $pdo->query($sql)->fetch();

    if ($foundProfileImage) {
        // Wenn das Bild gefunden wurde, dieses anzeigen
        $profileImagePath = $foundProfileImage['filename'];
    } else {
        // wenn kein Bild gefunden wurde, ein Default-Bild anzeigen
        $profileImagePath = "bilder/default-user-profile-picture-3.png";
    }
} else {
    $profileImagePath = "bilder/default-user-profile-picture-3.png";
}
