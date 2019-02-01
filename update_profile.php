    <?php
    session_start();
    include_once 'database.php';
    ?>
    <!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0"> <!-- корректное отображение на мобильных устройствах, отмена масштабирования -->
        <title>Einloggen</title>
        <!-- Bootstrap css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--  css -->
        <link href="index.css" rel="stylesheet">
        <!--   <script src="javascript.js"></script>-->

        <script>

            // SELECTING ALL TEXT ELEMENTS
            var Vorname = document.forms['valform']['Vorname'];
            var Nachname = document.forms['valform']['Nachname'];
            var username = document.forms['valform']['username'];
            var Kuerzel = document.forms['valform']['Kuerzel'];
            var email = document.forms['valform']['email'];
            var Studiengang = document.forms['valform']['Studiengang'];
            var password = document.forms['valform']['password'];
            var password_confirm = document.forms['valform']['password_confirm'];
            // SELECTING ALL ERROR DISPLAY ELEMENTS

            var vorname_fehler = document.forms['valform']['vorname_fehler'];
            var nachname_fehler = document.forms['valform']['nachname_fehler'];
            var username_error = document.forms['valform']['username_error'];
            var kuerzel_fehler = document.forms['valform']['kuerzel_fehler'];
            var email_error = document.forms['valform']['email_error'];
            var studiengang_fehler = document.forms['valform']['studiengang_fehler'];
            var password_error = document.forms['valform']['password_error'];

            // SETTING ALL EVENT LISTENERS
            username.addEventListener('blur', nameVerify, true);
            Vorname.addEventListener('blur', nameVerify, true);
            Nachname.addEventListener('blur', nameVerify, true);
            Kuerzel.addEventListener('blur', nameVerify, true);
            email.addEventListener('blur', emailVerify, true);
            password.addEventListener('blur', passwordVerify, true);
            Studiengang.addEventListener('blur', nameVerify, true);
            // validation function
            function Validate() {
// validate username
                if (username.value == "") {
                    username.style.border = "1px solid red";
                    document.getElementById('username_div').style.color = "red";
                    username_error.textContent = "Benutzername ist erforderlich";
                    username.focus();
                    return false;
                }
// validate username
                if (username.value.length < 3) {
                    username.style.border = "1px solid red";
                    document.getElementById('username_div').style.color = "red";
                    username.focus();
                    return false;
                }
// validate email
                if (email.value == "") {
                    email.style.border = "1px solid red";
                    document.getElementById('email_div').style.color = "red";
                    email_error.textContent = "Email ist erforderlich";
                    email.focus();
                    return false;
                }
// validate password
                if (password.value == "") {
                    password.style.border = "1px solid red";
                    document.getElementById('password_div').style.color = "red";
                    password_confirm.style.border = "1px solid red";
                    password_error.textContent = "Passwort ist erforderlich";
                    password.focus();
                    return false;
                }
// check if the two passwords match
                if (password.value != password_confirm.value) {
                    password.style.border = "1px solid red";
                    document.getElementById('pass_confirm_div').style.color = "red";
                    password_confirm.style.border = "1px solid red";
                    password_error.innerHTML = "Die Passwörter stimmen nicht überein";
                    return false;
                }
            }
            // event handler functions
            function nameVerify() {
                if (username.value != "") {
                    username.style.border = "1px solid #5e6e66";
                    document.getElementById('username_div').style.color = "#5e6e66";
                    name_error.innerHTML = "";
                    return true;
                }
            }
            function emailVerify() {
                if (email.value != "") {
                    email.style.border = "1px solid #5e6e66";
                    document.getElementById('email_div').style.color = "#5e6e66";
                    email_error.innerHTML = "";
                    return true;
                }
            }
            function passwordVerify() {
                if (password.value != "") {
                    password.style.border = "1px solid #5e6e66";
                    document.getElementById('pass_confirm_div').style.color = "#5e6e66";
                    document.getElementById('password_div').style.color = "#5e6e66";
                    password_error.innerHTML = "";
                    return true;
                }
                if (password.value === password_confirm.value) {
                    password.style.border = "1px solid #5e6e66";
                    document.getElementById('pass_confirm_div').style.color = "#5e6e66";
                    password_error.innerHTML = "";
                    return true;
                }
            }

        </script>



    </head>

    <body>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 signup_section">
                    <div class="register_form">
                        <div class="willkommen"><h5>Update Profil</h5></div>
                        <form action="do_update_profile.php" method="POST" class="form" onsubmit="return Validate() " name="valform"> <!--das Formular muss beim Abschicken  nicht validiert werden:-->
                            <div class="form-row" id="Vorname_div" >
                                <input type="text" class="form-control" name="Vorname" placeholder="Vorname" >
                                <div id="vorname_fehler"></div>
                            </div>
                            <div class="form-row" id="Nachname_div" >
                                <input type="text" class="form-control" name="Nachname"  placeholder="Nachname">
                                <div id="nachname_fehler"></div>
                            </div>
                            <div class="form-row" id="Kuerzel_div">
                                <input type="text" class="form-control" name="Kuerzel" placeholder="Kürzel">
                                <div id="kuerzel_fehler"></div>
                            </div>
                            <div class="form-row" id="username_div">
                                <input type="text" class="form-control" name="Username" placeholder="Benutzername">
                                <div id="name_error"></div>
                            </div>
                            <div class="form-row" id="email_div">
                                <input type="email" class="form-control" name="Email" placeholder="Email">
                                <div id="email_error"></div>
                            </div>

                            <div class="form-row" id="studiengang_div">

                                <select name="Studiengang" class="form-control">
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

                            <div class="form-row" id="password_div">
                                <!-- <input type="password" class="form-control" name="Passwort" id="password" placeholder="Passwort" required>-->
                                <input type="password" class="form-control" placeholder="Passwort" name="Passwort"/>
                                <!-- die Angaben werden in Elementattribut 'pattern' werden mit dem der Browser überprüft pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"-->
                                <!--<input type="button" value="Submit" onclick="analyze()"-->

                                <!--eingegebene Daten analysieren-->
                            </div>
                            <div class="form-row" id="pass_confirm_div">
                                <input type="password" class="form-control" placeholder="Passwort wiederholen" name="password_confirm"/>
                                <div id="password_error"></div>
                            </div>

                            <div class="form-row" >
                                <input type="text" class="form-control" name="Ueber" placeholder="Über mich Text">


                            <div class="form-check">
                                <input type="submit" class="btn btn-primary" name="Update" value="Updaten"/>    <!--    <label class="form-check-label" for="login_check">Mit der Anmeldung stimmst du <a href="#"> unseren Nutzungsbedgungen</a>, <a href="#">und Datenschutzrichtlinie </a>zu</label>-->
                            </div>



                        </form>


                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    </body>
    <footer>

        <a href="impressum_main.php" style="font-size: 20px; position:absolute; margin:5% 50% 50%; color: #4169E1;">Impressum </a>

    </footer>

    </html>

