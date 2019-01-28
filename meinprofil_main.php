<?php
session_start();
include 'gather_profileimage.php';
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
$studiengang_ausgelesen = $_SESSION ['aktiveruser_studi'];
$ueber=$_SESSION['uber_text'];
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
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<?php
include 'header.html';
?>
<body>
<div style="background-color:white;">
    <!--<img id="background" src="bilder/hintergrund.jpg" alt="">-->
    <div class="feed shadow-lg"
        <div class="card-layout" style="background-color:#E6e6Fa;">
        <h4 class="card-layout-header"><?php echo " $nutzer_ausgelesen"; ?></h4>
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
                                <div class="nav nav-pills flex-column" id="profile-usermenu">
                                    <p> <i class="fas fa-exchange-alt"></i> <a href="main.php"> Beiträge</a></p>
                                    <p> <i class="fas fa-user-friends"></i> <a href="Follow_list_main.php" > Following</a></p>
                                    <p> <i class="fas fa-globe"></i> <a href="news_main.php"> Neuigkeiten</a></p>
                                    <p> <i class="fas fa-calendar-week"></i> <a href="veranstaltungen_main.php"> Veranstaltungen</a></p>
                                </div><!-- END SIDEBAR Userimage -->
                            </div>
                            <div class="col-md-9">
                                <?php include 'profildaten.php'; ?>
                                <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded-full"> <a href="<?php echo 'https://mars.iuk.hdm-stuttgart.de/~oh019/do_follow.php?id='."$user_id";?>">Follow</button>
                            </div>
                            <div id="aktiveruser_ueber">
                                <h2>
                                    <?php
                                    echo $ueber;
                                    ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
        <!-- END SIDEBAR BUTTONS -->
</div>

<footer>

    <a href="impressum_main.php" style="font-size: 20px; margin-left:50%; color: white;border-style: solid; border-color: #dddddd;">Impressum </a>

</footer>





</body>


</html>









