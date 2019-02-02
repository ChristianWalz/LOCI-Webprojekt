<?php
session_start();
include 'database.php';
//Bild einfügen
if (isset($_POST ['submit'])){//um eine Datei hochzuladen-> müssen wir zuerst die Infos über die Datei zu bekommen
    $file = $_FILES['file'];//Variable $file definieren als $_FILES-> holt die ganze Infos von "input" vom Formular
    $actualUser = $_SESSION['aktiveruser'];//Sessionvariable $actualUser setzen
    $fileName = $_FILES['file']['name'];   //Bildformat herausfinden
    $fileTmpName = $_FILES['file']['tmp_name'];//Temporäter Name
    $fileSize = $_FILES['file']['size']; //Bildröße herausfinden
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $file_extension = explode ('.', $fileName); // den Namen explodieren-> wir bekommen zwei Stücke von Infos (Bildnamen und Bild-Extension)
    $fileActualExt = strtolower($file_extension[1]);//Kleinbuchstaben
    $allowed_format = array('jpg', 'jpeg', 'png');
    //Erlaubte Dateiformate
    if (in_array($fileActualExt, $allowed_format)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) {
                $PictureNewName = uniqid ('profileimage-', true) . "." . $fileActualExt;//Neue einzigartige id für das Bild + Erweiterung wird hinzugefügt
                $fileDestination = 'uploads/' . $PictureNewName; //es wird ein Datenbankeintrag erstellt
                move_uploaded_file($fileTmpName, $fileDestination);//das hochgeladene Bild wird in den Ordner $fileDestination geschoben

                // altes Profilbild finden
                $sql = "SELECT image_id, filename FROM profileimg WHERE USER_ID = $actualUser";
                $existingProfileimageIDsArray = array();
                foreach ($pdo->query($sql) as $image) {
                    $existingProfileimageIDsArray[] = $image['image_id'];
                }
                $existingProfileimageIDsList = implode(',', $existingProfileimageIDsArray);

                // neues Profilbild einfügen
                $sql = "INSERT INTO profileimg (USER_ID, filename) VALUES (?,?)";
                $stmt = $pdo->prepare($sql);
                $success = $stmt->execute([$actualUser, $fileDestination]);  //User ID und Verweis auf den Pfad auf dem Server, wo das Bild liegt

                if ($success) {

                    // altes Bild löschen
                    $sql = "DELETE FROM profileimg WHERE image_id IN ($existingProfileimageIDsList)";
                    $pdo->query($sql);

                    $profileimg_upload = 1; //Profilbild erfolgreich hochgeladen
                    header('Location: main.php?uploadsuccess');

                } else {
                    $profileimg_upload = 5; // INSERT failed
                }
            } else {
                $profileimg_upload = 2;
                echo "Diese Datei zu groß!";// Profilbild zu groß

            }
        } else {
            $profileimg_upload = 3;
            echo "Fehler beim Hochladen des Profilbilds";// Fehler beim Hochladen des Profilbilds
        }
    } else {
        $profileimg_upload = 0;
        echo "Kein Profilbild ausgewählt!";// Kein Profilbild ausgewählt
    }
    echo $profileimg_upload;

    //Prüfen ob alle Bedienungen erfüllt sind ->ansonsten kommt die Fehlermeldung

}
//überprüfen ob Button geklickt wurde und ob der Benutzer das Bild hochladen möchte

