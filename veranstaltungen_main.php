<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
$studiengang_ausgelesen = $_SESSION ['aktiveruser_studi'];
$ueber=$_SESSION['uber_text'];
include 'gather_profileimage.php';
if(!isset($_SESSION["angemeldet"]))
{
    echo"nicht angemeldet.";
    header("Location: index.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Willkommen bei Loci</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<?php
include 'header.html';
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="profile-sidebar"> <!--SIDEBAR-->
                <div id="profile-username" style="text-align:center">
                    <h2>
                        <?php
                        echo $nutzer_ausgelesen; //Nutzername anzeigen
                        ?>
                    </h2>
                </div>
                <!-- SIDEBAR Userimage -->
                <div class="profile-userpic"> <!--<div class="profile-img">-->
                    <?php echo '<img src="' . $profileImagePath . '" alt="Profilbild" class="img-responsive">' ?>  <!--Placeholder falls ein Nutzer kein Profilbild hochgeladen hat-->
                </div>
                <!-- END SIDEBAR Userimage -->
                <!--SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav sidenav" style="display: block !important;">
                        <li>
                            <a href="main.php">
                                <i class="fas fa-exchange-alt fa-xs"></i>Beiträge</a>
                        </li>
                        <li>
                            <a href="Follow_list_main.php">
                                <i class="fas fa-user-friends fa-xs"></i>Following</a>
                        </li>
                        <li>
                            <a href="news_main.php">
                                <i class="fas fa-globe fa-xs"></i>News</a>
                        </li>
                        <li class="active">
                            <a href="veranstaltungen_main.php">
                                <i class="fas fa-calendar-week fa-xs"></i>Events</a>
                        </li>
                    </ul>
                </div>
                <!-- END SIDEBARMENU -->
            </div>
        </div>
        <div class="col-sm-9">
            <div class="form-group">
                <div id="new_post">
                    <form action="do_veran_schreiben.php" method="post">
                 <textarea id="input" name="WAS" class="form-control" style="width:80%;" rows="3"  placeholder="Neue Veranstaltung? Worum geht es? schreibe es hier...">
                 </textarea>
                        <textarea id="input" name="WANN" class="form-control" style="width:80%;" rows="3"  placeholder="Wann?">
                 </textarea>
                        <textarea id="input" name="WO" class="form-control" style="width:80%;" rows="3"  placeholder="Wo?">
                 </textarea>
                        <button type="submit" class="btn btn-primary btn-sm" style="margin-left:46%; ">Posten</button>
                    </form>
                </div>
            </div>
            <!-- Darstellung der Beiträge-->
            <div class="feed">
                <!-- Benachrichtigung einfügen-->
                <?php include 'alert.php'
                ?>
                <div id="beitraege" style="margin-left: 15%;"><h2>Veranstaltungen</h2></div><br>
                <!-- Buttons zur Auswahl was angezeigt werden soll-->
                <script type="text/javascript">
                    function show(elementId) {
                        document.getElementById("alle_veranstaltungen").style.display="none";
                        document.getElementById("meine_veranstaltungen").style.display="none";
                        document.getElementById(elementId).style.display="block";
                    }
                </script>
                <button class="btn btn-outline-info btn-md"type="button" style="margin-left: 15%;" onclick="show('alle_veranstaltungen');">Alle Veranstaltungen</button>
                <button class="btn btn-outline-info btn-md" type="button" onclick="show('meine_veranstaltungen');">Meine Veranstaltungen</button>
                <!--alle News anzeigen lassen durch einbinden des Codes in 'news_hochschule'-->
                <div id="alle_veranstaltungen" style="font-size: 20px;">
                    <?php include 'veranstaltungen.php'
                    ?>
                </div>
                <div id="meine_veranstaltungen" style="display:none; font-size: 20px;">
                    <?php include 'meine_veranstaltungen.php'
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>

<footer>
    <a href="impressum_main.php" style="font-size: 20px; margin-left:50%; color: #708090; font-weight: lighter; ">Impressum </a>
</footer>

</body>
</html>


