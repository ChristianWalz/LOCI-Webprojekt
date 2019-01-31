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

            <div class="sidenav">
                <a class="active" href="main.php"> <i class="fas fa-exchange-alt fa-xs"></i>  Beiträge</a>
                <a href="Follow_list_main.php"><i class="fas fa-user-friends fa-xs"></i>  Following</a>
                <a href="news_main.php"><i class="fas fa-globe fa-xs"></i>  News</a>
                <a href="veranstaltungen_main.php"><i class="fas fa-calendar-week fa-xs"></i>  Events</a>
            </div>
            <!-- END SIDEBAR BUTTONS -->
        </div>
        <div class="col-sm-9">
            <div id="beitraege"><h2>Community</h2></div><br>
            <!-- Benachrichtigung einfügen-->
            <?php include "alert.php">
            $sql = "SELECT filename FROM profileimg WHERE USER_ID = $user_id";
            $foundProfileImage = $pdo->query($sql)->fetch();
            if ($foundProfileImage) {
            // if image found show image
            $profileImagePath = $foundProfileImage['filename'];
            } else {
            // if no image found user default image
            $profileImagePath = "bilder/default-user-profile-picture-3.png";
            }     //    echo '<img id="user_img" src="' . $profileImagePath . '" alt="Profilbild">'
            ?>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src= "<?php echo '<img id="user_img" src="' . $profileImagePath . '" alt="User_Image"'?>">
                <div class="card-body">
                    <div class="card-text style=font-size:20px;"><div id="alle_beitraege"">
                        <div><?php include "community.php" ?></div>
                    </div>

                    echo '<div class="col-sm-9">';
                        echo '<div class="card">';
                            echo '<div class="card-body">';
                                echo '<h5 class="card-title">' . $row['USERNAME'] . '</h5>';
                                echo '<p class="card-text">' . $row['TEXT'] . '</p>';
                                echo "<a   href=\"profil_fremd_main.php?id=" . $posts['USER_ID'] . "\" style='position: absolute;right: 1em; bottom: 6px; ' >Zum Profil</a>";
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                </div>
            </div>

            <!-- Darstellung der Beiträge-->


        </div>

    </div>

</div>



<footer>

    <a href="impressum_main.php" style="font-size: 20px; margin-left:50%; color: white;border-style: solid; border-color: #dddddd;">Impressum </a>

</footer>





</body>


</html>


