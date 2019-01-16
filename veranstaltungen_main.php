<?php
session_start();

?>

<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Mein Profil</title>
    <link href="bootstrap-4.1.3-dist/css" rel="stylesheet" id="bootstrap-css">
    <script src="bootstrap-4.1.3-dist/js"></script>
    <script src= "jquery-3.3.1.min.js" ></script>
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
                            <form action="main.php">
                                <input type="submit" value="Beiträge">
                            </form>


                            <!-- <input type="button" value="Neuigkeiten" onClick="$('#Anzeige').html('Hallo')"> -->
                        </li>

                        <li>
                            <form action="veranstaltungen_main.php">
                                <input type="submit" value="Veranstaltungen">
                            </form>
                        </li>

                        <li>
                            <form action="news_main.php">
                                <input type="submit" value="News">
                            </form>
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

            <!-- Darstellung der Veranstaltungen-->
            <div class="veranstaltungen-content">
                <h1>Veranstaltungen</h1>

                <script type="text/javascript">
                    function show(elementId) {
                        document.getElementById("alle_veranstaltungen").style.display="none";
                        document.getElementById("meine_veranstaltungen").style.display="none";

                        document.getElementById(elementId).style.display="block";
                    }
                </script>

                <button type="button" onclick="show('alle_veranstaltungen');">Alle Veranstaltungen</button>
                <button type="button" onclick="show('meine_veranstaltungen');">Meine Veranstaltungen</button>



                <!-- Einen Beitrag schreiben, muss noch erstellt werden-->
                <ul id="ul"> <li><a id="navigation" href="veranstaltung_schreiben.php" >neue Veranstaltung</a></li></ul><br><br><br><br>

                <div id="alle_veranstaltungen">
                    <!--alle Beiträge anzeigen lassen durch einbinden des Codes in 'alle_Beiträge'-->
                    <?php
                    include 'veranstaltungen.php'
                    ?>
                </div>

                <div id="meine_veranstaltungen" style="display:none">
                    <?php include 'meine_veranstaltungen.php'
                    ?>
                </div>

            </div>


        </div>


    </div>
</div>

<div id="impressum"><a href="" target="_blank">Impressum </a></div>





</body>


</html>
