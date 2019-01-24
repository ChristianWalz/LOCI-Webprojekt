<?php

if (!isset($_SESSION['profile_img_id'])) {     //Ruft Profilbild des eingeloggten Nutzers ab

    include 'database.php';                                   // Passwörter Benutzername Daten
    $option = array('charset' => 'utf8');
    $pdo = new PDO($option);

    $statement= $pdo->prepare("SELECT `image_id` FROM `profileimg` WHERE (user_id=:user_id)");  // Datenbankzugriff für die img_id
    $statement->execute(array("user_id" => $user_id));
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $image_id = $result["image_id"];
    $_SESSION['profile_img_id'] = $image_id;
    $profile_image_id = $_SESSION['profile_image_id'];     // Ruft Sessionvariable profile_img_id ab
} else {
    $profile_image_id = $_SESSION['profile_image_id'];     // Ruft Sessionvariable profile_img_id ab
}