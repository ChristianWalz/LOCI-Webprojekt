<?php

if (!isset($_SESSION['profile_img_id'])) {     //Ruft Profilbild des eingeloggten Nutzers ab

    include '../db.php';                                   // Passwörter Benutzername Daten
    $option = array('charset' => 'utf8');
    $db = new PDO($dsn, $dbuser, $dbpass, $option);

    $query = $db->prepare("SELECT `img_id` FROM `profile_img` WHERE (`user_id`=:user_id)");  // Datenbankzugriff für die img_id
    $query->execute(array("user_id" => $user_id));
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $img_id = $result["img_id"];
    $_SESSION['profile_img_id'] = $img_id;
    $profile_img_id = $_SESSION['profile_img_id'];     // Ruft Sessionvariable profile_img_id ab
} else {
    $profile_img_id = $_SESSION['profile_img_id'];     // Ruft Sessionvariable profile_img_id ab
}