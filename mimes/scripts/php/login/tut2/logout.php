<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>LogOut</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
$user = $_SESSION['user'];
if(session_destroy()) {
echo '<p align="center">Bye bye '.$user.'<br><br>Du hast Dich erfolgreich abgemeldet.<br><br><a href="index.php?lang=de&">Zur Anmeldung</a></p>';
}else{
echo '<p align="center">Beim Abmelden trat leider ein Fehler auf!<br><br>Bitte schliesse Dein Browserfenster.';
}
?>
</body>
</html>