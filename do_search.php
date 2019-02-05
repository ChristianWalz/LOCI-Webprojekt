<?php
session_start();
include 'database.php';
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
<html>
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
</head>
<?php include 'header.html';
?>
<body>
<div class="container" style="height:auto !important;">
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
                <div class="profile-userpic">
                    <?php echo '<img src="' . $profileImagePath . '" alt="Profilbild" class="img-responsive" style="height:auto;">' ?>  <!--Placeholder falls ein Nutzer kein Profilbild hochgeladen hat-->
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
                        <li>
                            <a href="veranstaltungen_main.php">
                                <i class="fas fa-calendar-week fa-xs"></i>Events</a>
                        </li>
                    </ul>
                </div>
                <!-- END SIDEBARMENU -->
            </div>
        </div>
        <div class="col-sm-9">
            <!-- Darstellung der Suchergebnisse-->
            <div class="grid">
                <?php
                $searchOption = $_GET['searchoption'];
                $searchText = strtolower($_GET['searchtext']); //String in Kleinbuchstaben konvertieren
                //Eine Suchoption auswählen
                $searchField = '';
                switch ($searchOption) {
                    case 'username':
                        $searchField = 'USERNAME';
                        break;
                    case 'email':
                        $searchField = 'EMAIL';
                        break;
                    case 'nachname':
                        $searchField = 'NACHNAME';
                        break;
                    case 'vorname':
                        $searchField = 'VORNAME';
                        break;
                    case 'ueber':
                        $searchField = 'UEBER';
                        break;
                    case 'studiengang':
                        $searchField = 'STUDIENGANG';
                        break;
                    default:
                        echo 'something went wrong';
                        exit;
                }
                //Case-Insensitives Filtern durchführen
                $sql = 'SELECT USER_ID, USERNAME, EMAIL, STUDIENGANG, NACHNAME, VORNAME, KUERZEL, UEBER FROM users WHERE lower(' . $searchField . ') LIKE "%' . $searchText . '%"';
                $posts = $pdo->query($sql)->fetchAll();
                foreach ($posts as $post) {
                    $sql = 'SELECT USER_ID, USERNAME, EMAIL, STUDIENGANG, NACHNAME, VORNAME, KUERZEL, UEBER FROM users WHERE lower(' . $searchField . ') LIKE "%' . $searchText . '%"';
                    $posts = $pdo->query($sql)->fetchAll();
                    $userId = $post['USER_ID'];
                    $sql = "SELECT filename FROM profileimg WHERE USER_ID = $userId";
                    $foundProfileImage = $pdo->query($sql)->fetch();
                    if ($foundProfileImage) {
                        // Wenn das Bild gefunden wurde, dieses anzeigen
                        $profileImagePath = $foundProfileImage['filename'];
                    } else {
                        // Wenn kein Bild ein Benutzer-Standardbild verwenden
                        $profileImagePath = "bilder/default-user-profile-picture-3.png";
                    }
                    //Darstellung der Ergebnisse
                    echo '<div class="grid-item" style="border: none !important; background-color: #e1e2e3 !important;">';
                    echo '<img class="post_img" src="' . $profileImagePath . '" />';
                    echo '<div>' ."Username: ". $post['USERNAME'] . '</div>';
                    echo '<div>' . "Vorname: ".$post['VORNAME'] . '</div>';
                    echo '<div>' . "Nachname: ".$post['NACHNAME'] . '</div>';
                    echo '<div>' ."Studiengang: ". $post['STUDIENGANG'] . '</div>';
                    echo '<div>' . "Kürzel: ".$post['KUERZEL'] . '</div>';
                    echo '<div>' ."Über: ". $post['UEBER'] . '</div>';
                    echo "<a href=\"profil_fremd_main.php?id=" . $post['USER_ID'] . "\">Zum Profil</a>";
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<footer>

    <a href="impressum_main.php" style="font-size: 20px; margin-left:50%; color: #708090; font-weight: lighter; ">Impressum </a>

</footer>

</body>
</html>