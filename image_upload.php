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
                $PictureNewName = uniqid ('profileimage-', true) . "." . $fileActualExt;//Neue id für das Bild
                // we create a unique id name so that the file won't get replaced with a file with the same name
                //then we add a name of the extension behind our new unique name
                $fileDestination = 'uploads/' . $PictureNewName;
                move_uploaded_file($fileTmpName, $fileDestination);//das hochgeladene Bild wird in den Ordner $fileDestination geschoben

                //es wird ein Datenbankeintrag erstellt
             /* $pic_id = $PictureNewName;
                $activeuser = $_SESSION['activeruser'];
                $success = $statement = $pdo->prepare("*/
               /*   INSERT INTO profileimg (USER_ID,filename)
                  VALUES ('$activeuser', '$fileDestination')");
                //User ID und Verweis auf den Pfad auf dem Server, wo das Bild liegt
                $pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
                $sql = "INSERT INTO posts (actual_user, image_id) VALUES (?, ?)";
                $statement = $pdo->prepare($sql);
                $statement->execute(array("$actual_user", "$image_id"));

                $statement->execute("");*/
                // $query->execute(array("user_id" => $user_id, "img_id" => $PictureNewName));

                // find old profile image
                $sql = "SELECT image_id, filename FROM profileimg WHERE USER_ID = $actualUser";
                $existingProfileimageIDsArray = array();
                foreach ($pdo->query($sql) as $image) {
                    $existingProfileimageIDsArray[] = $image['image_id'];
                }
                $existingProfileimageIDsList = implode(',', $existingProfileimageIDsArray);

                // insert new profile image
                $sql = "INSERT INTO profileimg (USER_ID, filename) VALUES (?,?)";
                $stmt = $pdo->prepare($sql);
                $success = $stmt->execute([$actualUser, $fileDestination]);

                if ($success) {

                    // delete old images
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

    //check if the file is allowed (if it has the proper extension)-> check if amy of these extensions listed in $allowed are inside $fileActualExt
//ansonsten kommt die Fehlermeldung

}

//überprüfen ob Button geklickt wurde und ob der Benutzer das Bild hochladen möchte
//submit weil wir "submit" als Name für unsere Button verwenden
