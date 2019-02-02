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
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>


</head>

<body>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 signup_section">
                <div class="register_form">
                    <div class="willkommen"><h4>Willkommen bei LOCI</h4></div>
                    <form action="do_register.php" method="POST" class="form" id="reg_form" name="valform">
                        <!--Registerformular-->
                        <div class="form-row">
                            <input type="text" class="form-control" id="form_name" name="Vorname" placeholder="Vorname" required
                                   pattern="^[a-zA-Z]{2,20}$"
                                   title="Dieses Feld darf nur Buchstaben enthalten und muss länger als ein Buchstabe sein!">
                            <span class="error_form" id="name_error_message"></span>
                        </div>
                        <div class="form-row">
                            <input type="text" class="form-control" id="form_lastname" name="Nachname"  placeholder="Nachname" required
                                   pattern="^[a-zA-Z]{2,20}$"
                                   title="Dieses Feld darf nur Buchstaben enthalten und muss länger als ein Buchstabe sein!">
                            <span class="error_form" id="lastname_error_message"></span>
                        </div>
                        <div class="form-row">
                            <input type="text" class="form-control" id="form_shortcut" name="Kuerzel" placeholder=" Kürzel " required
                                   pattern="^[a-zA-Z0-9]{4,6}$"
                                   title="Eingabe im folgenden Format: ow033">
                            <span class="error_form" id="shortcut_error_message"></span>
                        </div>
                        <div class="form-row">
                            <input type="text" class="form-control" id="form_username" name="Username" placeholder="Benutzername" required
                                   pattern="^[a-zA-Z0-9]{6,20}$"
                                   title="Benutzername muss mindestens 6 Zeichen lang sein und darf nur Buchstaben und Ziffer enthalten!">
                            <span class="error_form" id="username_error_message"></span>
                        </div>
                        <div class="form-row">
                            <input type="email" class="form-control" id="form_email" name="Email" placeholder="Email" required
                                   pattern="^[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                   title="Bitte gebe eine gültige E-Mail Adresse ein!">
                            <span class="error_form" id="email_error_message"></span>
                        </div>
                        <div class="form-row">
                            <input type="password" class="form-control" id="form_password" placeholder="Passwort" name="Passwort" required
                                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}"
                                   title="Muss mindestens eine Zahl sowie einen Groß- und Kleinbuchstaben sowie mindestens 8 Zeichen enthalten. ">
                            <span class="error_form" id="password_error_message"></span>
                        </div>
                        <div class="form-row">
                            <input type="password" class="form-control" id="form_confirm_password" placeholder="Passwort wiederholen" name="password_confirm" required/>
                            <span class="error_form" id="password_confirm_error_message"></span>
                        </div>
                        <div class="form-row">
                                <select name="Studiengang" class="form-control" id="form_course" required=""
                                        title="Bitte wähle deinen Studiengang aus!">
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
                                <span class="error_form" id="course_error_message"></span>
                            </div>

                        <!--SUBMIT-->
                            <input type="submit" class="btn btn-primary" name="Registrierung" value="Registrieren"/>
                         </form>




<!--<script type="text/javascript">

    $(function() {
        $("#name_error_message").hide();
        $("#lastname_error_message").hide();
        $("#shortcut_error_message").hide();
        $("#username_error_message").hide();
        $("#email_error_message").hide();
        $("#course_error_message").hide();
        $("#password_error_message").hide();
        $("#password_confirm_error_message").hide();


        //Variables für Fehler mit "false" initialisieren
        var error_name = false;
        var error_lastname = false;
        var error_shortcut = false;
        var error_username = false;
        var error_email = false;
        var error_course = false;
        var error_password = false;
        var error_password_confirm = false;


    // Aktion "focus out" im Input-Feld ausführen

    $("#form_name").focusout (function() {
        check_name(); //Die Funktion "check" wird ausgelöst, wenn das Eingabefeld den Fokus verliert
    });
    $("#form_lastname").focusout (function() {
        check_lastname();
    });
    $("#form_shortcut").focusout (function() {
        check_shortcut();
    });
    $("#form_username").focusout (function() {
        check_username();
    });
    $("#form_email").focusout (function() {
        check_email();
    });
    $("#form_course").focusout (function() {
        check_course();
    });
    $("#form_password").focusout (function() {
        check_password();
    });
    $("#form_confirm_password").focusout (function() {
        check_confirm_password();
    });

    function check_name() {
        var pattern = /^ [a-zA-Z]*$/;                    //es wird geprüft, ob der Wert mit dem Pattern übereinstimmt
        var name = $("#form_name").val ();
        if (pattern.test(name)&&name !== '') {
            $("#name_error_message").hide();
            $("#form_name").css("border-bottom","2px solid #34F458");
        }
        else {
            $("#name_error_message".html ("Es dürfen nur Zeichen enthalten sein!"));   //wenn der Wert nicht mit dem Pattern übereinstimmt
            $("#name_error_message").show();
            $("#form_name").css ("border-bottom","2px solid #F90A0A");
            error_name = true;
        }

    }

        function check_lastname() {
            var pattern = /^ [a-zA-Z]*$/;                    //es wird geprüft, ob der Wert mit dem Pattern übereinstimmt
            var lastname = $("#form_lastname").val ();
            if (pattern.test(lastname)&&lastname !== '') {
                $("#lastname_error_message").hide();
                $("#form_lastname").css("border-bottom","2px solid #34F458");
            }
            else {
                $("#lastname_error_message".html ("Es dürfen nur Buchstaben enthalten sein!"));   //wenn der Wert nicht mit dem Pattern übereinstimmt
                $("#lastname_error_message").show();
                $("#form_lastname").css ("border-bottom","2px solid #F90A0A");
                error_lastname = true;
            }
        }


        function check_shortcut() {
            var pattern = /^[a-zA-Z0-9 \-_]*$/;                    //es wird geprüft, ob der Wert mit dem Pattern übereinstimmt
            var shortcut = $("#form_shortcut").val ();
            if (pattern.test(shortcut)&&shortcut !== '') {
                $("#shortcut_error_message").hide();
                $("#form_shortcut").css("border-bottom","2px solid #34F458");
            }
            else {
                $("#shortcut_error_message".html ("Es dürfen nur Buchstaben und Ziffern enthalten sein!"));   //wenn der Wert nicht mit dem Pattern übereinstimmt
                $("#shortcut_error_message").show();
                $("#form_shortcut").css ("border-bottom","2px solid #F90A0A");
                error_lastname = true;
            }
        }

        function check_username() {
            var pattern = /^[a-zA-Z0-9 \-_]*$/;                    //es wird geprüft, ob der Wert mit dem Pattern übereinstimmt
            var username = $("#form_username").val ();
            if (pattern.test(username)&&username !== '') {
                $("#userame_error_message").hide();
                $("#form_username").css("border-bottom","2px solid #34F458");
            }
            else {
                $("#username_error_message".html ("Es dürfen nur Zeichen enthalten sein!"));   //wenn der Wert nicht mit dem Pattern übereinstimmt
                $("#username_error_message").show();
                $("#form_username").css ("border-bottom","2px solid #F90A0A");
                error_name = true;
            }

        }
        function check_course() {
              //es wird geprüft, ob der Wert mit dem Pattern übereinstimmt
            var course_length =  $("#form_course").val().length;

            if (shortcut !== '' &&course_length>5) {
                $("#course_error_message").html("Bitte auswählen!"); //wenn der Wert nicht mit dem Pattern übereinstimmt
                $("#form_course").css("border-bottom","2px solid #F90A0A");
            }
            else {

                $("#course_error_message").hide();
                $("#form_course").css ("border-bottom","2px solid #34F458");
                error_lastname = true;
            }
        }
        function check_password() {
            var password_length =  $("#form_password").val().length;                    //es wird geprüft, ob der Wert mit dem Pattern übereinstimmt
            if (passwort_length <6) {
                $("#password_error_message").html ("Mindestens 6 Zeichen!");//wenn der Wert nicht mit dem Pattern übereinstimmt
                $("#form_password").css("border-bottom","2px solid #F90A0A");
                error_password = true;
            }
            else {
                $("#password_error_message").hide();
                $("#form_lastname").css ("border-bottom","2px solid #34F458);
                error_password = true;
            }

        }

        function check_confirm_password() {
            var password=  $("#form_password").val();
            var confirm_password_=  $("#form_confirm_password").val();   //es wird geprüft, ob der Wert mit dem Pattern übereinstimmt
            if (passwort_!== retype_password) {
                $("#confirm_password_error_message").html ("Passwörter stimmen nicht überein!");//wenn der Wert nicht mit dem Pattern übereinstimmt
                $("#confirm_password_error_message").show();
                $("#form_confirm_password").css("border-bottom","2px solid #F90A0A");
                error_confirm_password = true;
            }
            else {
                $("#confirm_password_error_message").hide();
                $("#form_confirm_password").css ("border-bottom","2px solid #34F458);
                error_password = true;
            }

        }
        function check_email() {
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;                    //es wird geprüft, ob der Wert mit dem Pattern übereinstimmt
            var email = $("#form_email").val ();
            if (pattern.test(email)&&email !== '') {
                $("#email_error_message").hide();
                $("#form_email").css("border-bottom","2px solid #34F458");
            }
            else {
                $("#email_error_message".html ("Ungültige Email!"));   //wenn der Wert nicht mit dem Pattern übereinstimmt
                $("#email_error_message").show();
                $("#form_email").css ("border-bottom","2px solid #F90A0A");
                error_email = true;
            }
        }

        $(".register_form").submit (function() { //Falls ein von Feldern enthält einen Fehler, die Form wird nicht abgeschickt
            error_name = false;
            error_lastname = false;
            error_shortcut = false;
            error_username = false;
            error_email = false;
            error_course = false;
            error_password = false;
            error_password_confirm = false;


            check_name();
            check_lastname();
            check_shortcut();
            check_username();
            check_course();
            check_email();
            check_password();
            check_confirm_password();


            if (error_name === false && error_lastname === false && error_shortcut === false && error_username === false &&error_course === false && error_email === false && error_password === false && error_password_confirm === false) {
                alert ("Du hast dich erfolgreich registriert!");
                return true;
            }
            else {
                alert ("Bitte fühle das Formular korrekt aus!");
            }

        });
    });

</script> -->

                       <div class="bigger_text">Du hast bereits einen Account? </div>

                <a class="btn btn-outline-primary" href="index.php">Einloggen</a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 bg_section_signup">
                <img class="logo" src="LOCI.png" alt="logo"/>
            </div>

        </div>
    </div>
</div>


<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>

