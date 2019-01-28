<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
include 'database.php';

$statement = $pdo->prepare("SELECT * FROM users WHERE USER_ID = $user_id");
if ($statement->execute()) {
    while ($row = $statement->fetch()) {
        echo '<div>' . $row['USERNAME'] . '</div>';
        echo '<div>' . $row['VORNAME'] . '</div>';
        echo '<div>' . $row['NACHNAME'] . '</div>';
        echo '<div>' . $row['STUDIENGANG'] . '</div>';
        echo '<div>' . $row['EMAIL'] . '</div>';
        echo '<div>' . $row['KUERZEL'] . '</div>';
        echo '<div>' . $row['UEBER'] . '</div>';
    }
}