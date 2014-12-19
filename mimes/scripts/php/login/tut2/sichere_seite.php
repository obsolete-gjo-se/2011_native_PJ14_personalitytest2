<?php
// Abfrageschema:
// 	Endergebnis soll sein: du zeigst Seite an
// Else: du leitest weiter
// if Seite != secure
//		if user eingeloggt (s_id = session_id())
//		else (weiterletung auf login)
if(!session_is_registered('user') || $_SESSION['user'] == "") {
header("location:index.php");
die;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Sichere Seite</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<table width="400" bgcolor="#000000" border="0" cellpadding="5" cellspacing="1" align="center">
<tr>
  <td bgcolor="#e7e7e7" align="center">
  <?php echo "<b>Hallo ".$_SESSION['user']."</b>"; ?>
  <br><br>
  <b>Hier ist der sichere Inhalt!</b>
  <br><br>
  <a href="neu.php">Neuen Benutzer anlegen</a>
  <br><br>
  <a href="logout.php">LogOut</a>
  </td>
</tr>
</table>
</body>
</html>