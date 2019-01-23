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

var_dump($posts);
?>

<table>
    <th>User-ID</th>
    <th>Username</th>
    <th>Studiengang</th>
    <th>Vorname</th>
    <th>Nachname</th>
    <th>Kürzel</th>
    <th>Über</th>
    <?php
    foreach ($posts as $post) {
        echo '<tr>';
        echo '<td>' . $post['USER_ID'] . '</td>';
        echo '<td>' . $post['USERNAME'] . '</td>';
        echo '<td>' . $post['STUDIENGANG'] . '</td>';
        echo '<td>' . $post['VORNAME'] . '</td>';
        echo '<td>' . $post['NACHNAME'] . '</td>';
        echo '<td>' . $post['KUERZEL'] . '</td>';
        echo '<td>' . $post['UEBER'] . '</td>';
    //  echo '<td colspan="4"></td>';
        echo '</tr>';
    }
    ?>
</table>