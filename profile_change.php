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

<!--//we only can see upload images if we are logged in!-->
<form action="do_upload.php" method="POST" enctype="multipart/form-data">
    <!--enctype - braucht man für um die Bilder in upload.php zu übergeben-->

 <input type="file" name="file">

  <!--"choose file" button-->
  <button type="submit" name="submit">Bild hochladen</button>


</form>

</body>
