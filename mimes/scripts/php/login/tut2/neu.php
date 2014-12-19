<?php
session_start();
if(!session_is_registered('user') || $_SESSION['user'] == "") {
header("location:index.php");
die;
}
require("connect.inc.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Neuen Benutzer anlegen</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php if(!isset($_POST['submit'])) { ?>
<form action="<?php $PHP_SELF ?>" method="post">
<table width="400" bgcolor="#000000" border="0" cellpadding="5" cellspacing="1" align="center">
<tr>
  <td bgcolor="#e7e7e7" align="center" colspan="2">
 <b>Neuen Benutzer anlegen</b>
  </td>
</tr>
<tr>
 <td width="170" bgcolor="#e7e7e7">Benutzername</td>
  <td width="230" bgcolor="#ffffff"><input type="text" name="username" class="input"<?php if($_POST['username'] != "") { echo ' value="'.$_POST['username'].'"'; } ?> size="20"></td>
</tr>
<tr>
  <td width="170" bgcolor="#e7e7e7">Passwort</td>
  <td width="230" bgcolor="#ffffff"><input type="password" name="password" size="20" class="input"></td>
</tr>
<tr>
  <td width="170" bgcolor="#e7e7e7">Passwort wiederholen</td>
  <td width="230" bgcolor="#ffffff"><input type="password" name="password2" size="20" class="input"></td>
</tr>
<tr>
  <td bgcolor="#e7e7e7" align="center" colspan="2">
  <input type="submit" name="submit" value="Benutzer anlegen" class="button">
  </td>
</tr>
<tr>
  <td bgcolor="#e7e7e7" align="center" colspan="2">
  <a href="sichere_seite.php">Zurück zur Admin-Seite</a>
  </td>
</tr>
</table>
</form>
<?php
}elseif(!isset($_POST['username']) || $_POST['username'] == ""){
echo '<p align="center">Einen Benutzernamen brauchen wir schon ;-)<br><br><a href="neu.php">Zurück</a></p>';
}elseif(!isset($_POST['password']) || $_POST['password'] == "") {
echo '<p align="center">Ein Passwort brauchen wir schon ;-)<br><br><a href="neu.php">Zurück</a></p>';
}elseif($_POST['password'] != $_POST['password2']) {
echo '<form action="neu.php" method="post">';
echo '<p align="center">Die Passwörter stimmen nicht überein!<br><br>';
echo '<input type="hidden" name="username" value="'.$_POST['username'].'">';
echo '<input type="submit" name="zurueck" value="Zurück"></p>';
echo '</form>';
}else{
$query = @mysql_query("SELECT user FROM users WHERE user = '".$_POST['username']."'");
$result = @mysql_fetch_array($query);
if($_POST['username'] == $result['user']) {
  echo '<p align="center">Sorry, dieser Benutzername ist leider schon vergeben!<br><br><a href="neu.php">Zurück</a></p>';
  die;
}else{
  $username = $_POST['username'];
  $pass = md5($_POST['password']);
  if($insert = @mysql_query("INSERT INTO USERS SET user = '$username', pass = '$pass'")) {
	echo '<p align="center">Der neue Benutzer wurde erfolgreich angelegt!<br><br><a href="sichere_seite.php">Zur Admin-Seite</a></p>';
  }else{
	echo '<p align="center">Beim Anlegen des neuen Benutzers trat leider ein Fehler auf!<br><br><a href="neu.php">Zurück</a></p>';
  }
}
}
?>
</body>
</html>