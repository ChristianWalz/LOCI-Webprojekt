<?php
session_start();
$user_id = $_SESSION['aktiveruser'];
$nutzer_ausgelesen = $_SESSION['aktiveruser_name'];
if(isset($_SESSION['angemeldet'])) {
    echo 'Hier siehst du alle Beiträge.';

    $content = $_POST["content"];
    echo $content;
    include 'database.php';
    $statement = $pdo->prepare("SELECT * FROM posts");
    if ($statement->execute()) {
        while ($row = $statement->fetch()) {
            echo '<div class="container">';
            echo '<div class="row">';
            echo '<div class="col-sm-3">';
            // get user image and show it
            $userId = $row['USER_ID'];
            $sql = "SELECT filename FROM profileimg WHERE USER_ID = $userId";
            $foundProfileImage = $pdo->query($sql)->fetch();
            if ($foundProfileImage) {
                // if image found show image
                $profileImagePath = $foundProfileImage['filename'];
            } else {
                // if no image found user default image
                $profileImagePath = "bilder/default-user-profile-picture-3.png";
            }
            echo '<img class="post_img" src="' . $profileImagePath . '"/>';
            echo '</div>';
            echo '<div class="col-sm-9">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['USERNAME'] . '</h5>';
            echo '<p class="card-text">' . $row['TEXT'] . '</p>';
            echo "<a   href=\"profil_fremd_main.php?id=" . $row['USER_ID'] . "\" style='position: absolute;right: 1em; bottom: 6px; ' >Zum Profil</a>";
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

        }
    }
     /*   while ($row = $statement->fetch()) {
            echo"<tr>";
            while($row = $statement->fetch()) {
                echo '<div class="row">';
                // get user image and show it
                $userId = $row['USER_ID'];
                $sql = "SELECT filename FROM profileimg WHERE USER_ID = $userId";
                $foundProfileImage = $pdo->query($sql)->fetch();
                if ($foundProfileImage) {
                    // if image found show image
                    $profileImagePath = $foundProfileImage['filename'];
                } else {
                    // if no image found user default image
                    $profileImagePath = "bilder/default-user-profile-picture-3.png";
                }
  //       echo '<img class=post_img src="' . $profileImagePath . '"/>';
                echo '</div>';
                echo "<td>",$row['POST_ID'], "</td>";
                echo "<td>",$row['TEXT'],"</td>";
                echo "<td>",$row['USERNAME'],"</td>";
                //    echo "<td>",$row['USER_ID'], "</td>";
                echo "<a href=\"profil_fremd_main.php?id=" . $row['USER_ID'] . "\">Zum Profil</a>";
                echo "<br>";
                echo "-------";
                echo "<br>";
                echo "</tr>";
                echo "</table>";
                echo "<br>";
            }
        }
    }*/

    // table header
    /*  echo '<div class="row">';
      echo '<div class="col-sm-1">Profilbild</div>';
      echo '<div class="col-sm-1">Post-ID</div>';
      echo '<div class="col-sm-5">Text</div>';
      echo '<div class="col-sm-2">Name</div>';
      echo '<div class="col-sm-1">User-ID</div>';
      echo '<div class="col-sm-1"></div>';
      echo '<div class="col-sm-1"></div>';
      echo '</div>';*/
    /*   else {
               echo "Datenbank-Fehler:";
               echo $statement->errorInfo()[2];
               echo $statement->queryString;
               die();
           }*/
}
/*    echo '<img class=post_img src="' . $profileImagePath . '"/>';
        echo '</div>';
        echo '<div class="col-sm-1">' . $row['POST_ID'] . '</div>';
        echo '<div class="col-sm-6">' . $row['TEXT'] . '</div>';
        echo '<div class="col-sm-2">' . $row['USERNAME'] . '</div>';
        echo '<div class="col-sm-1">' . $row['USER_ID'] . '</div>';
        echo '<div class="col-sm-1"><a href="profil_fremd.php?id=' . $row['USER_ID'] . '">Zum Profil</a></div>';
        echo '</div>';*/
?>