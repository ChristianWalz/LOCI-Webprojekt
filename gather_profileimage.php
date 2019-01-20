<?php
session_start();
include 'database.php';

$actualUser = $_SESSION['aktiveruser'];

if ($actualUser) {
    // find profile image
    $sql = "SELECT filename FROM profileimg WHERE USER_ID = $actualUser";
    $foundProfileImage = $pdo->query($sql)->fetch();

    if ($foundProfileImage) {
        // if image found show image
        $profileImagePath = $foundProfileImage['filename'];
    } else {
        // if no image found user default image
        $profileImagePath = "bilder/default-user-profile-picture-3.png";
    }
} else {
    $profileImagePath = "bilder/default-user-profile-picture-3.png";
}
