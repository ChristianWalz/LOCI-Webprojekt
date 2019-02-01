<html>
    <head>
        <script src="JavaScript/masonry.pkgd.min.js"></script>
        <link rel="stylesheet" href="main.css">
    </head>

<?php
include 'database.php';
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

<body>
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
</body>
</html>