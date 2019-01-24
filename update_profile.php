<?php
session_start();
include 'header.html';
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
include 'gather_profileimage.php';
?>