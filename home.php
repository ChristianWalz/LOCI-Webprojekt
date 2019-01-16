<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Willkommen bei LOCI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script> function toggleSidebar() {
            document.getElementById ("profile-usermenu").classList.toggle('active');}</script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        /*  .navbar {
              margin-bottom: 0;
              border-radius: 0;
              background-color: #39375B;
          } */

        * {
            font-family:sans-serif;
        }
        .col-md-2 {


            background-color: #0c5460;
        }

        .col-md-8 {
            background-color: yellow;
        }
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 1000px}

        /* Set background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: gray(20%);
            height: 100%;
        }



        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}
        }

        .profile-img {
            width: 50px;
            height: 50px;
            float: none;
            margin: 0;
            -webkit-border-radius: 20% !important;
            -moz-border-radius: 20% !important;
            border-radius: 20% !important;
        }


        #profile-usermenu {
            position:relative;/*should be "fixed"!*/
            width:200px;
            height:100%;
            background: #daebe8;
            left:-165px;
            transition: all 300ms linear; /*Sidebar öffnet sanft*/
            text-align: left;
            padding-left: -45px;

        }

        #profile-usermenu p {
            text-indent: 10px;
        }

        #profile-usermenu.active {
            left:0;

        }

        #profile-usermenu p {
            color:#008080;
            list-style: none;
            padding: 13px 13px;
            border-bottom: 1px solid

        }

        #profile-usermenu .toggle-btn {
            position: absolute;
            left:155px;
            top:0;
        }

        /*Hamburger Menu*/
        #profile-usermenu .toggle-btn span {
            display:block;
            width:30px;
            height:5px;
            Background:#151719;
            margin:5px 5px;
        }


        #profile-usermenu {
            margin-top: -20px;
        }
        /*Suchfeld*/
        .search-txt {
            position:absolute;
            top:50%;
            left:50%;
            transform: translate (-50%,-50%);
            background:#d1d8e0;

        }

        .form-group form {
            margin-top: 25px;
            width:350px;
        }
        .posts {
            float:left;
            margin-top: 20px;
            margin-left:5%;

        }

        .right {
            float:left;
            margin-left:5%;
        }

        .navigation{
            margin-left:200px;

        }

        .change_img .flat_button {
            margin-top: 10px;

        }

        .change_img {
            float:left;

        }
        header {
            margin-bottom: 0;
            border-radius: 0;
            background-color: #39375B;
            color:ghostwhite;
            font-family:sans-serif;
            font-weight: bold;

        }

        .img-responsive {
            width: 100%;
            max-width: 50px;
            height: auto;

        }

    </style>
</head>
<header>

    <div class="collapse navbar-collapse" id="myNavbar">

        <!--LOGO-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="home.php" class="navbar-brand">LOCI</a>
        </div>
        <div class="profile-img">
            <img src="https://static.change.org/profile-img/default-user-profile.svg" class="img-responsive" alt="">
            <!--Placeholder falls ein Nutzer kein Profilbild hochgeladen hat-->
        <div class="change_img">
            <button>
                <a id="profile_edit" href="profile_change.php" class="flat_button ">Bearbeiten</a>
            </button>
        </div>
        <ul class="nav navbar-nav">
            <li class="navigation"><a href="profile.php">Home</a></li>
            <!--<li><a href="#">Suche</a></li>-->
        </ul>
        <!--Suchfeld-->
        <ul class="nav navbar-nav">
            <input type="text" placeholder="Suche" >
            <a class="search-btn" href="#"
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
        <!--  <td><a href="profile.php">Home</a></td>
          <td> <a href="#">Suche</a></td>
          <td><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></td>
              </tr>
          </table>-->
    </div>

</header>
<body>
<!--Navigation -->
<!--<nav class="navbar navbar-inverse">-->
<!--<div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!--PROFILBILD
    </div>
</div>
<!--</nav>-->

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-md-2 sidenav">
            <div id="profile-usermenu">
                <!--HAMBURGER Menu -->
                <div class= "toggle-btn" onclick="toggleSidebar()">
                    <span> </span>
                    <span> </span>
                    <span> </span>
                </div>
                <!--MENU LINKS-->
                <p><a href="#" target="_blank"> <span class="glyphicon glyphicon-globe"></span> Neuigkeiten</a></p>
                <p><a href="#"><span class="glyphicon glyphicon-time"></span>Stundenplan </a></p>
                <p><a href="#"><span class="glyphicon glyphicon-briefcase"></span> Jobbörse </a></p>
                <p><a href="#"><span class="glyphicon glyphicon-dashboard"></span> Anzeigen </a></p>
                <p><a href="#"><span class="glyphicon glyphicon-cog"></span> Einstellungen </a></p>
            </div>
        </div>
        <!-- Ende HamburferMENU -->
        <!--BEITRÄGE/ NEWSFEED-->
        <div class="col-sm-8 text-left">
            <!--Eingabefeld-->
            <div class="form-group">
                <div class="col-md-8">
                    <form>
                        <!--  Mehrzeiliges  Eingabefeld  (in  diesem  Fall  3  Zeilen)  -->
                        <div class="form-group">
                            <textarea id="input" class="form-control" rows="3" placeholder="Teile etwas deinen Mitstudierenden mit..."></textarea>
                        </div>
                        <!--   Button  -->
                        <button type="submit" class="btn btn-primary btn-md">Absenden</button> </form>
                </div>
            </div>
        </div>

        <div class="posts">

            <h1>Deine Beiträge</h1>
            <?php $content= $_POST["content"];
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

    <!--ENDE BEITRÄGE/NEWSFEED-->
    <div class="col-md-2">

        <!--Neuigkeiten-->
        <div class="right">
            Neuigkeiten und Trends
            <div class="well">
                <p>#hashtag</p>
            </div>
            <div class="well">
                <p>#nocheinhashtag</p>
            </div>
        </div>
    </div>

    <!--ENDE NEUIGKEITEN-->
</div>
</div>


</body>
</html>

