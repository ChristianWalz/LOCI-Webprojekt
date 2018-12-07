<?php
session_start();
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
    <link href="main.css" rel="stylesheet">
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
                <img class="logo"src="LOCI.png" alt="logo"/>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 login_section">
                <form class="needs-validation" action="do_login.php" method="post" novalidate>

                    <!-- дальше записывает-->
                    <h1>Willkommen bei LOCI</h1>
                    <div class="error" id="user-error">
                        <img src="bilder/error.svg" alt="error_icon"/>
                        Falsche Benutzername
                    </div>
                    <div class="error" id="pass-error">
                        <img src="bilder/error.svg" alt="error_icon" />
                        Falsches Passwort
                    </div>
                    <div class="form-row">
                        <input type="text" class="form-control" name="Nutzername"  aria-describedby="emailHelp" placeholder="Benutzername" required>
                    </div>
                    <div class="form-row">
                        <input type="password" class="form-control" name="Passwort"  placeholder="Passwort" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="login_check">
                        <label class="form-check-label" for="login_check">Eingeloggt bleiben</label>
                        <a href="#">Passwort vergessen?</a>
                    </div>
                    <input type="submit" class="btn btn-primary" name="Login" value="Einloggen" />
                    <div class="bigger_text">Neu bei Loci? </div>
                    <input type="submit" class="btn btn-outline-primary" name="Register" value="Registrieren" />
                </form>
                <!-- нужно переходить на страницу профиля-->
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Custom JS -->
<script src="index.js"></script>

</body>
</html>