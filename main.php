<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
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
    <link href="bootstrap-4.1.3-dist/css" rel="stylesheet" id="bootstrap-css">
    <script src="bootstrap-4.1.3-dist/js"></script>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script> function toggleSidebar() {
            document.getElementById ("profile-usermenu").classList.toggle('active');}</script>

</head>
<body background="bilder/hintergrund.jpg">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <span class="navbar-brand"><a href="home.php"><img id=logo src="LOCI.png" alt="logo"></a>
    </span>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Einstellungen</a>
            </li>
         <!--   <li class="nav-item">
                <a class="nav-link" href="#"></a>
            </li>-->
            <li class="nav-item">
                <a class="nav-link" href="#">Abmelden</a>
            </li>
        </ul>
    </div>

    <div class="nav-item-right"><p> <i class="fas fa-cog" aria-hidden="true" id="nav_options"></i> <a href="#" target="_blank"> </a></p></div>
</nav>

<div class="container">
    <!--<img id="background" src="bilder/hintergrund.jpg" alt="">-->
        <div class="row">
          <div class="col-sm-3">
            <div class="abstand">
                <div id="benutzer_name">
                    <h2>
                    <?php if(isset($_SESSION['angemeldet']))
                    {
                        echo $nutzer_ausgelesen;
                    }?>
                    </h2>

                </div>
                <!--Placeholder falls ein Nutzer kein Profilbild hochgeladen hat-->
            <div class="profile-img"><img id="user_img" src="/bilder/default-user-profile.svg" alt="Profilbild">
            </div>
            <div class="change_img">
                <button type="button" class="btn btn-light btn-sm">
                <a href="image_upload.php" id="flat_button">Bearbeiten</a> <!-- flat button fehlt css-->
                </button>
            </div>

                 <div class="nav nav-pills flex-column" id="profile-usermenu">
                <!--HAMBURGER Menu -->
                    <div class= "toggle-btn" onclick="toggleSidebar()">
                        <span> </span>
                        <span> </span>
                        <span> </span>
                    </div>
                <!--MENU -->
                <!--<p> <i class="fas fa-cog"></i> <a href="#" target="_blank"> Freunde</a></p>-->
                    <p> <i class="fas fa-user-friends"></i> <a href="friends_list.php" target="_blank"> Freunde</a></p>
                    <p> <i class="fas fa-globe"></i> <a href="news_main.php" target="_blank"> Neuigkeiten</a></p>
                    <p> <i class="far fa-calendar-times"></i> <a href="#" target="_blank"> Stundenplan</a></p>
                    <p> <i class="fas fa-calendar-week"></i> <a href="veranstaltungen_main.php" target="_blank"> Veranstaltungen</a></p>
                    <p> <i class="fas fa-briefcase"></i> <a href="#" target="_blank"> Jobbörse</a></p>
                    <p> <i class="fas fa-exchange-alt"></i> <a href="#" target="_blank"> Anzeigen</a></p>
                 </div>
            </div> <!--<hr class="d-sm-none">-->
        </div>
        <div class="col-sm-6">
            <div class="abstand">
                <!-- Darstellung der Beiträge-->
                 <div class="space"><h6>Beitrag erstellen</h6></div>
                <!--Eingabefeld-->
                <div class="form-group">
                    <div id="new_post"><form>
                            <!--  Eingabefeld  -->
                            <div class="form-group">
                                <textarea id="input" class="form-control" rows="3" href="schreiben.php" placeholder="Teile etwas deinen Mitstudierenden mit..."></textarea>
                            </div>
                            <!--   Button  -->
                            <button type="submit" class="btn btn-primary btn-sm">Posten</button> </form>
                    </div>
                </div>
            </div>
            <div class="abstand">
                <div class="feed">
                    <div id="beitraege"><h4>Beiträge</h4></div>
                    <!-- Buttons zur Auswahl was angezeigt werden soll-->

                    <script type="text/javascript">
                        function show(elementId) {
                            document.getElementById("alle_beitraege").style.display="none";
                            document.getElementById("verfolgte_beitraege").style.display="none";
                            document.getElementById("meine_beitraege").style.display="none";
                            document.getElementById(elementId).style.display="block";
                        }
                    </script>

                    <button type="button" class="btn btn-secondary btn-sm" onclick="show('alle_beitraege');">Alle Beiträge</button>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="show('verfolgte_beitraege');">Verfolgte Beiträge</button>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="show('meine_beitraege');">Meine Beiträge</button>

                    <!--alle Beiträge anzeigen lassen durch einbinden des Codes in 'alle_Beiträge'-->
                    <div id="alle_beitraege">
                    <?php
                    include 'alle_beitraege.php'
                    ?>
                    </div>


                    <div id="verfolgte_beitraege" style="display:none">
                        <?php include 'verfolgte_beitraege.php'
                        ?>
                    </div>

                    <div id="meine_beitraege" style="display:none">
                        <?php include 'meine_beitraege.php'
                        ?>
                    </div>

                </div>
            </div>
        </div>
            <div class="col-sm-3">
                <div class="abstand">
                    <div class="news">
                    <h2>Neuigkeiten</h2>
                         Bla

                         Bla

                         Bla


                         Bla

                    </div>  <!--    <hr class="d-sm-none">-->
                </div>
            </div>
        </div>
    </div>



<div class="jumbotron text-center" style="margin-bottom:0">
    <p>Footer</p>
</div>

</body>
</html>