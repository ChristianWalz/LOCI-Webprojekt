<?php
session_start();
/*if (isset($_SESSION['eingelogt'])) {
    header('Location: main.php');      // Benutzer ist bereits eingeloggt und wird zum Feed weitergeleitet
    exit;
} else if (!isset($_SESSION['name']) and (isset($_GET["error"])) and ((empty(htmlspecialchars($_GET["error"]))))) {
    $error = 0;                                 // Error 0 bedeutet es gab keinen Error beim einloggen (noch keinen Loginversuch)
} else if (!isset($_SESSION['name']) and (isset($_GET["error"])) and ((htmlspecialchars($_GET["error"])) == 1)){
    $error = 1; // Error 1 Benutzername- und Passwortkombination nicht vorhanden
} else if (!isset($_SESSION['name']) and (isset($_GET["error"])) and ((htmlspecialchars($_GET["error"])) == 2)){
    $error = 2;                                 // Error 2 Fehler bei der Registrierung - Nicht alle Felder ausgefüllt bei der registrierung
} else if (!isset($_SESSION['name']) and (isset($_GET["error"])) and ((htmlspecialchars($_GET["error"])) == 3)){
    $error = 3;                                 // Error 3 Fehler bei der Registrierung - Nutzername schon vergeben
} else if (!isset($_SESSION['name']) and (isset($_GET["error"])) and ((htmlspecialchars($_GET["error"])) == 4)){
    $error = 4;                                 // Error 4 Fehler bei der Registrierung - Passwörter stimmen nicht überein
}*/
?>



<!DOCTYPE html>
<html lang="de">
<title>LOCI
</title>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0"> <!-- корректное отображение на мобильных устройствах, отмена масштабирования -->
    <title>Willkommen bei LOCI</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Custom css -->
    <link href="index.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">

</head>

<body>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 bg_section_login">
                <img class="logo" src="LOCI.png" alt="logo"/>
            </div>
            <div class="col-12 m_bg_section_login">
                <img class="logo" src="LOCI.png" alt="logo"/>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 login_section">

                    <form class="needs-validation" action="do_login.php" method="post" novalidate>

                    <!-- Formular-->
                  <!-- <div class="error" id="user-error">
                        <img src="bilder/error.svg" alt="error_icon"/>
                        Falsche Benutzername
                    </div>
                    <div class="error" id="pass-error">
                        <img src="bilder/error.svg" alt="error_icon" />
                        Falsches Passwort
                    </div>-->
                    <div class="form-row">
                        <input type="text" class="form-control" name="Nutzername"  aria-describedby="emailHelp" placeholder="Benutzername" required>
                    </div>
                    <div class="form-row">
                        <input type="password" class="form-control" name="Passwort"  placeholder="Passwort" required>
                    </div>
                    <input type="submit" class="btn btn-primary" name="Login" value="Einloggen">
                </form>


                    <div class="bigger_text">Neu bei Loci? </div>
                <form class="needs-validation" action="register.php" method="post" novalidate>
                <input type="submit" class="btn btn-outline-primary" name="Register" value="Registrieren">
                </form>

                <!-- нужно переходить на страницу профиля-->
            </div>
        </div>
    </div>
</div>


</body>
</html>