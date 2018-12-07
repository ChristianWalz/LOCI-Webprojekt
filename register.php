<?php
session_start();
include_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0"> <!-- корректное отображение на мобильных устройствах, отмена масштабирования -->
    <title>Einloggen</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--  css -->
    <link href="main.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 bg_section_signup">
                <img class="logo" src="LOCI.png" alt="logo"/>
            </div>
            <div class="col-12 m_bg_section_signup">
                <img class="logo" src="LOCI.png" alt="logo"/>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 signup_section">
                <form action="do_register.php" method="post" class="needs-validation" novalidate>
                    <h1>Willkommen bei LOCI</h1>
                    <div class="error" id="mail-error">
                        <img src="bilder/error.svg" alt="error_icon"/>
                        Falsche Benutzername
</div>
                    <div class="form-row">
                        <input type="text" class="form-control" name="Nutzername" id="name" aria-describedby="emailHelp" placeholder="Benutzername" required>
                    </div>
                    <div class="form-row">
                        <input type="email" class="form-control" name="Email" id="mail" placeholder="Email" required>
                    </div>
                   <!--<div class="form-row">
                        <input type="email" class="form-control" id="re_mail" placeholder="Email wiederholden" required>
                    </div>-->
                    <div class="form-row">
                 <!--       <input type="text" class="form-control" name="Attribut" id="studiengang"  placeholder="Studiengang" required>-->

                        <select name="Attribut" class="form-control" id="studiengang" required>
                            <option>Studiengang auswählen</option>
                            <option value="AM3">AM3</option>
                            <option value="AM7">AM7</option>
                            <option value="BAS">BAS</option>
                            <option value="BI7">BI7</option>
                            <option value="BIP7">BIP7</option>
                            <option value="CP3">CP3</option>
                            <option value="CR7">CR7</option>
                            <option value="DBM">DBM</option>
                            <option value="DC7">DC7</option>
                            <option value="DCB7">DCB7</option>
                            <option value="DCV7">DCV7</option>
                            <option value="DT7">DT7</option>
                            <option value="GT">GT</option>
                            <option value="IBM">IBM</option>
                            <option value="ID7">ID7</option>
                            <option value="IP7">IP7</option>
                            <option value="JCM">JCM</option>
                            <option value="AM7">MCM</option>
                            <option value="ME7">ME7</option>
                            <option value="MI7">MI7</option>
                            <option value="MM3">MM3</option>
                            <option value="MM7">MM7</option>
                            <option value="MOV">MOV</option>
                            <option value="MP7">MP7</option>
                            <option value="MR3">MR3</option>
                            <option value="MW7">MW7</option>
                            <option value="OM7">OM7</option>
                            <option value="OMM">OMM</option>
                            <option value="PD3">PD3</option>
                            <option value="PM7">PM7</option>
                            <option value="PT7">PT7</option>
                            <option value="SPR">SPR</option>
                            <option value="UK3">UK3</option>
                            <option value="VT7">VT7</option>
                            <option value="WBZ">WBZ</option>
                            <option value="WI3">WI3</option>
                            <option value="WI7">WI7</option>
                            <option value="WM7">WM7</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <input type="password" class="form-control" name="Passwort" id="password" placeholder="Passwort" required>
                    </div>
                    <div class="form-row">
                    <input type="password" class="form-control" id="re_password" placeholder="Passwort wiederholen" required>
            </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="login_check">
                        <label class="form-check-label" for="login_check">Mit der Anmeldung stimmst du <a href="#"> unseren Nutzungsbedgungen</a>, <a href="#">und Datenschutzrichtlinie </a>zu</label>
                    </div>
                    <input type="submit" class="btn btn-primary" name="Registrierung" value="Registrieren">
                    <div class="bigger_text">Du hast bereits einen Account? </div>

                </form>

                    <!-- <input type="submit" class="btn btn-outline-primary" name="Login" value="Einloggen"/> -->
                <a class="btn btn-outline-primary" href="index.php">Einloggen</a>

            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- JS -->
<script src="index.js"></script>


</body>
</html>

