<?php
session_start();
include 'header.html';
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
include 'gather_profileimage.php';
?>

<div class="change_img">
    <a href="change_image.php" class="btn btn-light btn-sm" id="flat_button">Bearbeiten</a> <!-- flat button fehlt css-->
</div>

