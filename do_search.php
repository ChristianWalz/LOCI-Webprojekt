<?php
session_start();
include 'database.php';
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
$studiengang_ausgelesen = $_SESSION ['aktiveruser_studi'];
$ueber=$_SESSION['uber_text'];
include 'gather_profileimage.php';
include 'header.html';
if(!isset($_SESSION["angemeldet"]))
{
    echo"nicht angemeldet.";
    header("Location: index.php");
    die();
}
$searchOption = $_GET['searchoption'];
$searchText = strtolower($_GET['searchtext']);

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

$sql = 'SELECT USER_ID, USERNAME, EMAIL, STUDIENGANG, NACHNAME, VORNAME, KUERZEL, UEBER FROM users WHERE lower(' . $searchField . ') LIKE "%' . $searchText . '%"';
$posts = $pdo->query($sql)->fetchAll();

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
    <!--<link rel="stylesheet" href="header.css">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--<script> function toggleSidebar() {
            document.getElementById ("profile-usermenu").classList.toggle('active');}</script>-->
</head>
<body>
<div class="container">

         <!-- Darstellung der Suchergebnisse-->
        <div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 150 }'>
            <?php
            foreach ($posts as $post) {
                $sql = 'SELECT USER_ID, USERNAME, EMAIL, STUDIENGANG, NACHNAME, VORNAME, KUERZEL, UEBER FROM users WHERE lower(' . $searchField . ') LIKE "%' . $searchText . '%"';
                $posts = $pdo->query($sql)->fetchAll();
                $userId = $post['USER_ID'];
                $sql = "SELECT filename FROM profileimg WHERE USER_ID = $userId";
                $foundProfileImage = $pdo->query($sql)->fetch();
                if ($foundProfileImage) {
                    // if image found show image
                    $profileImagePath = $foundProfileImage['filename'];
                } else {
                    // if no image found user default image
                    $profileImagePath = "bilder/default-user-profile-picture-3.png";
                }
                echo '<div class="grid-item">';
                echo '<img class="post_img" width="150" src="' . $profileImagePath . '" />';
                //   echo '<div>' . $post['USER_ID'] . '</div>';
                echo '<div>' ."Username: ". $post['USERNAME'] . '</div>';
                echo '<div>' . "Vorname: ".$post['VORNAME'] . '</div>';
                echo '<div>' . "Nachname: ".$post['NACHNAME'] . '</div>';
                echo '<div>' ."Studiengang: ". $post['STUDIENGANG'] . '</div>';
                echo '<div>' . "Kürzel: ".$post['KUERZEL'] . '</div>';
                echo '<div>' ."Über: ". $post['UEBER'] . '</div>';
                echo "<a href=\"profil_fremd_main.php?id=" . $post['USER_ID'] . "\">Zum Profil</a>";
                //  echo '<td colspan="4"></td>';
                echo '</div>';

            }
            ?>
        </div>
</div>
</body>
</html>