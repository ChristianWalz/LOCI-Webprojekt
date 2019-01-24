<?php
if(isset($_SESSION["angemeldet"]))
{
    echo"angemeldet.";
}
else
{
    echo"nicht angemeldet.";
    die();
}

$id=$_GET['id'];
$content=$_POST["content"];

include 'database.php';

$statement = "UPDATE posts SET TEXT='" .$content. "' WHERE id=$id";
  if($ergebnis=$pdo->query($statement))
  {
      header (  'Location:profile.php');
  }
  else{
      echo "Datenbank-Fehler";
  }