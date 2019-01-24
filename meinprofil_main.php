<?php
session_start();
include 'header.html';
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
$studiengang_ausgelesen = $_SESSION ['aktiveruser_studi'];
$ueber=$_SESSION['uber_text'];
include 'gather_profileimage.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <title>Profil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="bootstrap-4.1.3-dist/css" rel="stylesheet" id="bootstrap-css">
    <script src="bootstrap-4.1.3-dist/js"></script>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--<script> function toggleSidebar() {
            document.getElementById ("profile-usermenu").classList.toggle('active');}</script>-->
</head>
<body background="bilder/hintergrund.jpg">

<div class="container">
    <!--<img id="background" src="bilder/hintergrund.jpg" alt="">-->
    <div class="row">
        <div class="col-sm-3">

            <!-- SIDEBAR Userimage -->
            <!--Placeholder falls ein Nutzer kein Profilbild hochgeladen hat-->

            <div class="profile-img">
                <?php echo '<img id="user_img" src="' . $profileImagePath . '" alt="Profilbild">' ?>
            </div>

            <!-- END SIDEBAR Userimage -->
            <div id="benutzer_name">
                <h2>
                    <?php

                    echo $nutzer_ausgelesen;
                    ?>
                </h2>

            </div>
            <br>
            <br>

            <div class="nav nav-pills flex-column" id="profile-usermenu">
                <!--HAMBURGER Menu -->
                <!--  <div class= "toggle-btn" onclick="toggleSidebar()">
                        <span> </span>
                        <span> </span>
                        <span> </span>
                  </div>-->
                <!--MENU -->  <!-- SIDEBAR BUTTONS -->
                <p> <i class="fas fa-exchange-alt"></i> <a href="main.php" target="_blank"> Beiträge</a></p>
                <p> <i class="fas fa-user-friends"></i> <a href="Follow_list_main.php" target="_blank"> Following</a></p>
                <p> <i class="fas fa-globe"></i> <a href="news_main.php" target="_blank"> Neuigkeiten</a></p>
                <!-- <p> <i class="far fa-calendar-times"></i> <a href="#" target="_blank"> Stundenplan</a></p>-->
                <p> <i class="fas fa-calendar-week"></i> <a href="veranstaltungen_main.php" target="_blank"> Veranstaltungen</a></p>
                <!--  <p> <i class="fas fa-briefcase"></i> <a href="#" target="_blank"> Jobbörse</a></p>-->

            </div>
            <!-- END SIDEBAR BUTTONS -->
        </div>
        <div class="col-sm-5">

            <!-- Darstellung der Beiträge-->

            <div class="feed">
                <br>
                <div id="beitraege"><h2>Profil</h2></div>

                <!--alle Beiträge anzeigen lassen durch einbinden des Codes in 'alle_Beiträge'-->
                <div id="alle_beitraege" style="font-size: 20px;">
                    <div><?php include 'meinprofil.php' ?></div>
                </div>


            </div>
        </div>
        <div class="col-sm-4">

            <!--Eingabefeld-->
            <div class="form-group">
                <div id="new_post"><form>
                        <!--  Eingabefeld  -->
                        <div class="form-group">
                            <textarea id="input" class="form-control" style="width:80%;" rows="3" href="schreiben.php" placeholder="Teile etwas deinen Mitstudierenden mit..."></textarea>
                        </div>
                        <!--   Button  -->
                        <button type="submit" class="btn btn-primary btn-lg" style="margin-left:46%; ">Posten</button> </form>
                </div>
            </div>
        </div>
    </div>

</div>

<footer>

    <a href="impressum_main.php" style="font-size: 20px; margin-left:50%; color: white;border-style: solid; border-color: #dddddd;">Impressum </a>

</footer>





</body>


</html>









