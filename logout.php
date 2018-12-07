<?php
session_start();
session_destroy(); //zersört die Session
//echo" Logout erfolgreich.";
header('Location: index.php'); //weiterleitung auf die Indexseite