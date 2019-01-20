<?php
session_start();
include 'database.php';

/*$user_id = $_SESSION['aktiveruser'];*/// Setzt Sessionvariable userid
//Einfügen Bild
if (isset($_POST ['submit'])){//um eine Datei hochzuladen-> müssen wir zuerst die Infos über die Datei zu bekommen
    $file = $_FILES['file'];//Variable $file definieren als $_FILES-> holt die ganze Infos von "input" vom Formular
    $actualUser = $_SESSION['aktiveruser'];
    $fileName = $_FILES['file']['name'];   //extract all the informations from the file-> what kind of type it is
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size']; //"name"- to get the name of the file and so on
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $file_extension = explode ('.', $fileName);
    //explode the name by the punctuation and get two different names->take apart a certain string "." from the punctuation
    //say what type of files we allow to upload to our website
    //so we get two pieces of information- the name of the file and the name of extention
    $fileActualExt = strtolower($file_extension[1]);
    //make sure that we always make it lower case before checking it
    //"end"- function - to get the last piece of data from the array
    //so we have the extension from the file we have just uploaded

    $allowed_format = array('jpg', 'jpeg', 'png');
    //tell what type of files we allow to upload

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
                } else {
                    $profileimg_upload = 5; // INSERT failed
                }
            } else {
                $profileimg_upload = 2; // Profilbild zu groß
            }
        } else {
            $profileimg_upload = 3; // Fehler beim Hochladen des Profilbilds
        }
    } else {
        $profileimg_upload = 0; // Kein Profilbild ausgewählt
    }
    echo $profileimg_upload;

    /*  $pic_id=$PictureNewName;
        $pdo = new PDO ($dsn, $dbuser, $dbpass, $option);
        $success=$pdo->prepare("INSERT INTO `posts` (`USER_ID`,`image_id` ) VALUES (?,?)");
        $statement->execute(array("$user_id", "$pic_id"));


        if ($success) {
            header("Location:index.php?uploadsuccess");
        } else {
            header("Location:index.php?uploadfailed");
        }
    }  else {
        echo "Diese Datei ist zu groß!";
    }
} else {
    echo "Beim hochladen dieser Datei ist ein Fehler aufgetreten";
}
// check if we had mistakes uploading this file
} else {
echo "Dieser Dateityp  darf nicht hochgeladen werden";
}
*/

    //check if the file is allowed (if it has the proper extension)-> check if amy of these extensions listed in $allowed are inside $fileActualExt
//ansonsten kommt die Fehlermeldung

}


//überprüfen ob Button geklickt wurde und ob der Benutzer das Bild hochladen möchte
//submit weil wir "submit" als Name für unsere Button verwenden
