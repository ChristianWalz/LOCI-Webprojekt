<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
$studiengang_ausgelesen = $_SESSION ['aktiveruser_studi'];
$ueber=$_SESSION['uber_text'];
include 'gather_profileimage.php';
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
    <!--<link rel="stylesheet" href="header.css">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--<script> function toggleSidebar() {
            document.getElementById ("profile-usermenu").classList.toggle('active');}</script>-->
</head>

<?php
    include 'header.html';
?>
<body>

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
            <ul>
                   <!--MENU -->  <!-- SIDEBAR BUTTONS -->
                    <li> <i class="fas fa-exchange-alt"></i> <a href="main.php"> Beiträge</a></li>
                    <li> <i class="fas fa-user-friends"></i> <a href="Follow_list_main.php" > Following</a></li>
                    <li> <i class="fas fa-globe"></i> <a href="news_main.php"> Neuigkeiten</a></li>
                   <!-- <p> <i class="far fa-calendar-times"></i> <a href="#" target="_blank"> Stundenplan</a></p>-->
                    <li> <i class="fas fa-calendar-week"></i> <a href="veranstaltungen_main.php"> Veranstaltungen</a></li>
                  <!--  <p> <i class="fas fa-briefcase"></i> <a href="#" target="_blank"> Jobbörse</a></p>-->
                </ul>
            </div>
                <!-- END SIDEBAR BUTTONS -->
        </div>
        <div class="col-sm-9">
            <div class="form-group">
                <div id="new_post">


                    <form action="do_schreiben.php" method="post">
                 <textarea id="input" name="TEXT" class="form-control" style="width:80%;" rows="3"  placeholder="Teile etwas deinen Mitstudierenden mit...">
                 </textarea>
                        <button type="submit" class="btn btn-primary btn-sm" style="margin-left:46%; ">Posten</button>
                    </form>


                </div>
            </div>
                    <!-- Darstellung der Beiträge-->

                    <div class="feed">
                        <br>
                        <!-- Benachrichtigung einfügen-->
                        <?php include 'alert.php'
                        ?>
                        <!-- Buttons zur Auswahl was angezeigt werden soll-->

                        <script type="text/javascript">
                            function show(elementId) {
                                document.getElementById("alle_beitraege").style.display="none";
                                document.getElementById("verfolgte_beitraege").style.display="none";
                                document.getElementById("meine_beitraege").style.display="none";
                                document.getElementById(elementId).style.display="block";
                            }
                        </script>

                        <button type="button" class="btn btn-outline-info btn-md" onclick="show('alle_beitraege');">Alle Beiträge</button>
                        <button type="button" class="btn btn-outline-info btn-md" onclick="show('verfolgte_beitraege');">Verfolgte Beiträge</button>
                        <button type="button" class="btn btn-outline-info btn-md" onclick="show('meine_beitraege');">Meine Beiträge</button>

                        <!--alle Beiträge anzeigen lassen durch einbinden des Codes in 'alle_Beiträge'-->



                        <div id="alle_beitraege" style="font-size: 20px;">
                            <div><?php include 'alle_beitraege.php' ?></div>
                        </div>

                        <div id="verfolgte_beitraege" style="display:none;font-size: 20px;">
                            <?php include 'verfolgte_beitraege.php'
                            ?>
                        </div>

                        <div id="meine_beitraege" style="display:none; font-size: 20px;">
                            <?php include 'meine_beitraege.php'
                            ?>
                        </div>
                   </div>
        </div>
        <div class="col-sm-4">

            <!--Eingabefeld-->

        </div>
    </div>

</div>



<footer>

    <a href="impressum_main.php" style="font-size: 20px; margin-left:50%; color: white;border-style: solid; border-color: #dddddd;">Impressum </a>

</footer>





</body>


</html>









