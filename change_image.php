<?php
session_start();
include 'database.php';
?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>



<form action="image_upload.php" method="POST" enctype="multipart/form-data">
    <!-- Form-Element enctype - braucht man für um die Bilder in upload.php zu übergeben
    <!--"multipart/form-data"-Attribut wird notiert, da sonst wird nur der Name und nicht die Datei selbst übertragen-->
    <label>Wählen Sie eine Bilddatei (*.png, *.jpg,*jpeg usw.) von Ihrem Rechner aus.</label>

 <input type="file" name="file">
<!-- Formularelement input type="file" - für die Übertragung einer Datei vom lokalen Rechner zusammen mit dem Formular
input type "file" funktioniert nur mit der POST-Methode!-->

  <button type="submit" name="submit">Bild hochladen</button>
    <!--"Bild hochladen" button-->

</form>

</body>
