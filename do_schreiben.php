<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
if(!isset($_SESSION["angemeldet"]))
{
    echo"nicht angemeldet.";
    die();
}
$text = $_POST["TEXT"];
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
echo $text;
include 'database.php';
//um eine Datei hochzuladen-> müssen wir zuerst die Infos über die Datei zu bekommen
if ($_FILES['file']['name']) { //es wird geprüft, ob in $_FILES['file']['name'] irgendwas drin steht
    $file = $_FILES['file'];//Variable $file definieren als $_FILES-> holt die ganze Infos von "input" vom Formular
    $actualUser = $_SESSION['aktiveruser'];//Sessionvariable $actualUser setzen
    $fileName = $_FILES['file']['name'];   //Bildformat herausfinden
    $fileTmpName = $_FILES['file']['tmp_name'];//Temporäter Name
    $fileSize = $_FILES['file']['size']; //Bildröße herausfinden
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $file_extension = explode('.', $fileName); // den Namen explodieren-> wir bekommen zwei Stücke von Infos (Bildnamen und Bild-Extension)
    $fileActualExt = strtolower($file_extension[1]);//Kleinbuchstaben
    $allowed_format = array('jpg', 'jpeg', 'png');
    //Erlaubte Dateiformate
    if (in_array($fileActualExt, $allowed_format)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                $pictureNewName = uniqid('postimage-', true) . "." . $fileActualExt;//Neue id für das Bild
                // we create a unique id name so that the file won't get replaced with a file with the same name
                //then we add a name of the extension behind our new unique name
                $fileDestination = 'uploads/' . $pictureNewName;
                move_uploaded_file($fileTmpName, $fileDestination);//das hochgeladene Bild wird in den Ordner $fileDestination geschoben
                $statement = $pdo->prepare("INSERT INTO posts (USERNAME, USER_ID, TEXT, IMAGE) VALUES (?,?,?,?)");
                $statement->execute(array($nutzer_ausgelesen, $user_id, $text, $fileDestination));
            }
        }
    }
} else {
    $statement = $pdo->prepare("INSERT INTO posts (USERNAME, USER_ID, TEXT) VALUES (?,?,?)");
    $statement->execute(array($nutzer_ausgelesen, $user_id, $text));
}

//echo " id in der Datenbank: ".$id=$pdo->lastInsertId();
header("Location: main.php");

