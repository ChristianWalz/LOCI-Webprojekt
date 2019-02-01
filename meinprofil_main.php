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
    <!--<link rel="stylesheet" href="header.css">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--<script> function toggleSidebar() {
            document.getElementById ("profile-usermenu").classList.toggle('active');}</script>-->
</head>

<?php
include 'header.html';
?>
<body>
<!--<div style="background-color:white;">*/
    <!--<img id="background" src="bilder/hintergrund.jpg" alt="">-->
<div class="feed shadow-lg"
<div class="card-layout" style="background-color:#E6e6Fa;">
    <h4 class="card-layout-header"><?php echo " Mein Profil"; ?></h4>
    <!--    <h4 class="card-layout-header"><?php echo " $nutzer_ausgelesen"; ?></h4>-->
    <div class="card-body">
        <div class="card-body feed-background">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <!-- SIDEBAR Userimage -->
                        <!--Placeholder falls ein Nutzer kein Profilbild hochgeladen hat-->
                        <div class="profile-img">
                            <?php echo '<img id="user_img" src="' . $profileImagePath . '" alt="Profilbild">' ?>
                        </div>
                        <div class="change_img">
                            <a href="change_image.php" class="btn btn-light btn-sm" id="flat_button">Bearbeiten</a>
                        </div>


                        <div class="sidenav">
                            <a class="active" href="main.php"> <i class="fas fa-exchange-alt fa-xs"></i>  Beiträge</a>
                            <a href="Follow_list_main.php"><i class="fas fa-user-friends fa-xs"></i>  Following</a>
                            <a href="news_main.php"><i class="fas fa-globe fa-xs"></i>  News</a>
                            <a href="veranstaltungen_main.php"><i class="fas fa-calendar-week fa-xs"></i>  Events</a>
                        </div><!-- END SIDEBAR Userimage -->
                    </div>
                    <div class="col-md-9">
                        <?php include 'profildaten.php'; ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SIDEBAR BUTTONS -->
<!--</div>-->

<footer>

    <a href="impressum_main.php" style="font-size: 20px; margin-left:50%; color: white;border-style: solid; border-color: #dddddd;">Impressum </a>

</footer>





</body>


</html>



