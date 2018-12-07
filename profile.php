
<?php
session_start();
?>

<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Mein Profil</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="profile.css" >

</head>

<body>
<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR Userimage -->
                <div class="profile-img">
                    <img src="https://static.change.org/profile-img/default-user-profile.svg" class="img-responsive" alt="">
                </div>

                <div>
                    <button>
                    <a id="profile_edit" href="profile_change.php" class="flat_button ">Bearbeiten</a>
                    </button>
                </div>
                <!-- END SIDEBAR Userimage -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        Hier steht dein Name
                    </div>
                    <div class="profile-studiengang">
                        Hier steht dein Studiengang
                     </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">Folgen</button>
                    <button type="button" class="btn btn-danger btn-sm">Nachricht</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-envelope"></i>
                                Nachrichten </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="glyphicon glyphicon-globe"></i>
                                Neuigkeiten</a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-time"></i>
                                Stundenplan </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-briefcase"></i>
                                Jobbörse </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-dashboard"></i>
                                Anzeigen </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-cog"></i>
                                Einstellungen </a>
                        </li>

                        <li>
                            <a href="logout.php">
                                <i class="glyphicon glyphicon-log-out"></i>
                                Abmelden </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                Beiträge</div>
        </div>
    </div>
</div>

    <div id="impressum"><a href="" target="_blank">Impressum </a></div>


<?php

$user_id = $_SESSION['aktiveruser'];
if(isset($_SESSION['angemeldet']))
{
    echo '"$user_id" ist angemeldet.';
}
else
{
echo"Du bist nicht angemeldet.";
die();
}
echo"<br>";
echo"<br>";
$content= $_POST["content"];
echo $content;
include 'database.php';
$statement = $pdo->prepare("SELECT * FROM posts");
if($statement->execute()) {
while($row=$statement->fetch()) {
echo $row['POST_ID']." ".$row['TEXT']." ".$row['USER_ID'];
echo "<a href=\"edit.php?id=".$row['POST_ID']."\">EDIT</a>";
echo "<br>";
}
} else {
echo "Datenbank-Fehler:";
echo $statement->errorInfo()[2];
echo $statement->queryString;
die();
}
?>
</form>
</body>
<br>
<br>

</html>
