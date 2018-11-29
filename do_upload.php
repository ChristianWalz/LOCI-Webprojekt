<?php
include_once 'database.php';
//um eine Datei hochzuladen-> müssen wir zuerst die Infos über die Datei zu bekommen
//Variable $file definieren als $_FILES-> holt die ganze Infos von "input" vom Formular


    $first=$_FILES ['file'] ['name'];
    $fileTmpName=$_FILES ['file'] ['tmp_name'];
    $fileSize=$_FILES ['file'] ['size'];
    $fileError=$_FILES ['file'] ['error'];
    $fileType=$_FILES ['file'] ['type'];

    //extract all the informations from the file-> what kind of type it is
//"name"- to get the name of the file and so on
    $fileExt = explode ('.', $fileName);
//explode the name by the punctuation and get two different names->take apart a certain string "." from the punctuation
//say what type of files we allow to upload to our website
//so we get two pieces of information- the name of the file and the name of extention
    $fileActualExt = strtolower(end ($fileExt));
    //make sure that we always make it lower case before checking it
//"end"- function - to get the last piece of data from the array
//so we have the extension from the file we have just uploaded

    $allowed=array('jpg','jpeg','png');
    //tell what type of files we allow to upload

if (in_array($fileActualExt,$allowed)) {
    if ($fileError===0) {
        if($fileSize < 2000000) {
            $fileNameNew = uniqid ('', true).".".$fileActualExt;
            // we create a unique id name so that the file won't get replaced with a file with the same name
            //then we add a name of the extension behind our new unique name
            $fileDestination = '/home/oh019/public_html/bilder'.$fileNameNew;
//upload the file inside the root folder
            move_uploaded_file($fileTmpName,$fileDestination);
            //the function that uploades the file (temporary location, new location)
            header("Location:index.php?uploadsuccess");

            //success message


        }  else {

            echo "Diese Datei ist zu groß!";
        }

    } else {

        echo "Beim hochladen dieser Datei ist ein Fehler aufgetreten";
    }
        //check if we had mistakes uploading this file


} else {

    echo "Dieser Dateityp  darf nicht hochgeladen werden";
}


    //check if the file is allowed (if it has the proper extension)-> check if amy of these extensions listed in $allowed are inside $fileActualExt
//ansonsten kommt die Fehlermeldung

}

//überprüfen ob Button geklickt wurde und ob der Benutzer das Bild hochladen möchte
//submit weil wir "submit" als Name für unsere Button verwenden


if(isset($_POST['submit'])){

    // Count total files
    $countfiles = count($_FILES['files']['name']);

    // Prepared statement
    $query = "INSERT INTO images (name,image) VALUES(?,?)";

    $statement = $pdo->prepare($query);

    // Loop all files
    for($i=0;$i<$countfiles;$i++){

        // File name
        $filename = $_FILES['files']['name'][$i];

        // Get extension
        $ext = end((explode(".", $filename)));

        // Valid image extension
        $valid_ext = array("png","jpeg","jpg");

        if(in_array($ext, $valid_ext)){

            // Upload file
            if(move_uploaded_file($_FILES['files']['tmp_name'][$i],'upload/'.$filename)){

                // Execute query
                $statement->execute(array($filename,'upload/'.$filename));

            }

        }

    }
    echo "File upload successfully";
}
?>