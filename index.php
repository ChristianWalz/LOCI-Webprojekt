<?php
session_start();
if (isset($_SESSION['angemeldet'])) //prüft ob schon angemeldet, wenn ja weiterleitung
{
    header("Location: main.php");
}

?>

<!DOCTYPE html>
<html lang="de">
<title>LOCI
</title>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0">
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
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 login_section">
                <div class="willkommen"><h4>Willkommen bei LOCI</h4></div>

                    <form class="needs-validation" action="do_login.php" method="post">
                    <!-- Formular-->

                    <div class="form-row">
                        <input type="text" class="form-control" name="Nutzername"  placeholder="Benutzername" required>
                    </div>
                    <div class="form-row">
                        <input type="password" class="form-control" name="Passwort"  placeholder="Passwort" required>
                    </div>
                    <input type="submit" class="btn btn-primary" name="Login" value="Einloggen">
                </form>

                    <div class="bigger_text">Neu bei Loci? </div>
                <!--EINLOGGEN-->
                <form class="needs-validation" action="register.php" method="post" novalidate>
                    <!--Verweis auf Registerseite-->
                <input type="submit" class="btn btn-outline-primary" name="Register" value="Registrieren">
                </form>
            </div>
        </div>
    </div>
</div>


</body>
</html>