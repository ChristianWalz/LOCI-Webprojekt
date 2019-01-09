
<?php
session_start();
?>

<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Mein Profil</title>
    <link href="bootstrap-4.1.3-dist/css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script> function toggleSidebar() {
            document.getElementById ("profile-usermenu").classList.toggle ('active');}</script>
    <link rel="stylesheet" href="profile.css" >

</head>

<body>

<div class="wrapper">
    <div class="header">
        <div class="profile-sidebar">
            <!-- SIDEBAR Profilbild-->
            <div class="profile-img">
                <img src="https://static.change.org/profile-img/default-user-profile.svg" class="img-responsive" alt="">
                <!--Placeholder falls ein Nutzer kein Profilbild hochgeladen hat-->
            </div>

            <div>
                <button>
                    <a id="profile_edit" href="profile_change.php" class="flat_button ">Bearbeiten</a>
                </button>
            </div>
            <!-- Ende SIDEBAR Profilbild -->
        </div>

        <!-- SIDEBAR UserName-->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                Name
            </div>
            <div class="profile-studiengang">
                Studiengang
            </div>

        </div>
        <!-- Ende SIDEBAR USERName-->
    </div>
</div>


<div>
    <div class="menu">
        <div class="container">
               <div class="row profile">
                   <div class="col-md-3">
                <!-- HAMBURGER MENU -->
                        <div id="profile-usermenu"> <div class= "toggle-btn" onclick="toggleSidebar()">
                        <!--Hamburger Menu -->
                        <span> </span>
                        <span> </span>
                        <span> </span>
                        </div>

                            <ul>
                            <li>
                                <a href="#"> <span class="glyphicon glyphicon-envelope"></span>Home</a>
                            </li>
                            <li><a href="#" target="_blank"> <span class="glyphicon glyphicon-globe"></span> Neuigkeiten</a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-time"></span>Stundenplan </a>
                            </li>
                            <li>
                                 <a href="#"><span class="glyphicon glyphicon-briefcase"></span> Jobbörse </a>
                            </li>
                            <li>
                                  <a href="#"> <span class="glyphicon glyphicon-dashboard"></span> Anzeigen </a>
                            </li>
                            <li>
                                <a href="#"><span class="glyphicon glyphicon-cog"></span> Einstellungen </a>
                            </li>
                            <li>
                                <a href="logout.php"> <span class="glyphicon glyphicon-log-out"></span> Abmelden </a>
                            </li>
                         </ul>

                        </div>
                     </div>

                   <!-- SIDEBAR BUTTONS -->
                   <div class="profile-userbuttons">
                       <button type="button" class="btn btn-success btn-sm">Folgen</button>
                       <button type="button" class="btn btn-danger btn-sm">Nachricht</button>
                   </div>
                   <!-- Ende SIDEBAR BUTTONS -->


               </div>
        </div>
    </div>
</div>
        <!-- Ende HAMBURGER MENU -->


        <div class="main">

        <div class="profile-content">

            <ul id="ul"> <li><a id="navigation" href="schreiben.php" >neuer Beitrag</a></li></ul>
            <h1>Deine Beiträge</h1>
            <?php
            $user_id = $_SESSION['aktiveruser'];
            if(isset($_SESSION['angemeldet']))
            {
                echo 'Nutzer mit der Nummer '. $user_id; echo 'ist angemeldet.';
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

        </div>
    </div>

    <div class="right">Neuigkeiten und Trends</div>


</body>


</html>
