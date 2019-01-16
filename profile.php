<!DOCTYPE html>
<html lang="de">
<head>
    <title>Bootstrap 4 Website Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script> function toggleSidebar() {
    document.getElementById ("profile-usermenu").classList.toggle('active');}</script>
    <style>


        nav {
            display:flex;
            align-content : center;
        }
        /*PROFILBILD*/
       #user_img {
            height: 200px;
            background: #aaa;
            margin: 0;
            -webkit-border-radius: 50% !important;
            -moz-border-radius: 50% !important;
            border-radius: 50% !important;
       }

        /*LOGO*/
       #logo {
            height:30px;
            width:auto;
            margin:5px;

       }
       #flat_button {
            margin:65px;
       }
        .btn-light {
            background-color:#D3D3D3;
       }


        #nav_options {
            flex: 0 0 auto;
            justify-content: flex-end;
            margin-left: 8px;
        }

        /*Eingabefeld*/
        #input {
            width: 350px;
            height:80px;
            margin:30px 30px 40px;
            padding: 10px 5px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            border: 1px solid #cfcfcf;
            -webkit-box-shadow: inset 0 0 4px 2px rgba(0,0,0, 0.1);
            -moz-box-shadow: inset 0 0 4px 2px rgba(0,0,0, 0.1);
            box-shadow: inset 0 0 4px 2px rgba(0,0,0, 0.1);

        }
        /*Pseudoklasse :focus für Gloweffekt*/
        #input:focus {
            outline:0;
            border:1px solid #95D2DF;
            -webkit-box-shadow: 0 0 5px 4px rgba(36,184,194, 0.10);
            -moz-box-shadow: 0 0 5px 4px rgba(36,184,194, 0.10);
            box-shadow: 0 0 5px 4px rgba(36,184,194, 0.10);
        }
        #new_post button {
            margin-top: -50px;
            margin-left: 280px;

        }
        .fa-cog {
            color: #1da1f2;
        }



    </style>
</head>
<body>

<!--<div class="jumbotron text-center" style="margin-bottom:0">
    <h1>My First Bootstrap 4 Page</h1>
    <p>Resize this responsive page to see the effect!</p>
</div>-->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <span class="navbar-brand"><a href="home.php"><img id=logo src="LOCI.png" alt="logo"></a>
    </span>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>
    </div>

    <div class="nav-item-right"><p> <i class="fas fa-cog" aria-hidden="true" id="nav_options"></i> <a href="#" target="_blank"> </a></p></div>
</nav>

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-3">
            <div class="abstand">
                <h2>NAME</h2>
            <div class="profile-img"><img id="user_img" src="https://static.change.org/profile-img/default-user-profile.svg" alt="Profilbild">
            </div> <!--Placeholder falls ein Nutzer kein Profilbild hochgeladen hat-->
            <div class="change_img">
                <button type="button" class="btn btn-light btn-sm">
                <a href="profile_change.php" id="flat_button">Bearbeiten</a> <!-- flat button fehlt css-->
                </button>
            </div>

      <!--      <h3>Some Links</h3>
            <p>Lorem ipsum dolor sit ame.</p>-->
       <!--     <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>-->

                 <div class="nav nav-pills flex-column" id="profile-usermenu">
                <!--HAMBURGER Menu -->
                    <div class= "toggle-btn" onclick="toggleSidebar()">
                        <span> </span>
                        <span> </span>
                        <span> </span>
                    </div>
                <!--MENU -->
                <!--<p> <i class="fas fa-cog"></i> <a href="#" target="_blank"> Freunde</a></p>-->
                    <p> <i class="fas fa-user-friends"></i> <a href="#" target="_blank"> Freunde</a></p>
                    <p> <i class="fas fa-globe"></i> <a href="#" target="_blank"> Neuigkeiten</a></p>
                    <p> <i class="far fa-calendar-times"></i> <a href="#" target="_blank"> Stundenplan</a></p>
                    <p> <i class="fas fa-briefcase"></i> <a href="#" target="_blank"> Jobbörse</a></p>
                    <p> <i class="fas fa-exchange-alt"></i> <a href="#" target="_blank"> Anzeigen</a></p>
                 </div>
            </div> <!--<hr class="d-sm-none">-->
        </div>
        <div class="col-sm-6">
            <div class="abstand">
                 <h6>Beitrag erstellen</h6>
            <!--Eingabefeld-->
                <div class="form-group">
                    <div id="new_post"><form>
                            <!--  Mehrzeiliges  Eingabefeld  (in  diesem  Fall  3  Zeilen)  -->
                            <div class="form-group">
                                <textarea id="input" class="form-control" rows="3" placeholder="Teile etwas deinen Mitstudierenden mit..."></textarea>
                            </div>
                            <!--   Button  -->
                            <button type="submit" class="btn btn-primary btn-sm">Posten</button> </form>
                    </div>
                </div>
            </div>
            <div class="abstand">
                <div class="feed">
                    <h5>Title description, Dec 7, 2017</h5>
                    <div class="fakeimg">Fake Image</div>
                    <p>Some text..</p>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                    <br>

                    <p>Some text..</p>
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