
<?php
session_start();
  require("connect.inc.php");
  ?>
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
  <html>
  <head>
    <title>LogIn zum Adminbereich</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
  <?php if(!isset($_POST['submit'])) { ?>
  <form action="<?php $PHP_SELF ?>" method="post">
 <table width="400" bgcolor="#000000" border="0" cellpadding="5" cellspacing="1" align="center">
    <tr>
      <td bgcolor="#e7e7e7" align="center" colspan="2">
      <b>Bitte erst anmelden</b>
      </td>
    </tr>
    <tr>
      <td width="170" bgcolor="#e7e7e7">Benutzername</td>
      <td width="230" bgcolor="#ffffff"><input type="text" name="username" size="20" class="input"<?php if($_POST['username'] != "" ) {echo ' value="'.$_POST['username'].'"';} ?>></td>
    </tr>
    <tr>
      <td width="170" bgcolor="#e7e7e7">Passwort</td>
      <td width="230" bgcolor="#ffffff"><input type="password" name="password" size="20" class="input"></td>
    </tr>
    <tr>
      <td bgcolor="#e7e7e7" align="center" colspan="2">
      <input type="submit" name="submit" value="Anmelden" class="button">
      </td>
    </tr>
  </table>
  </form>
  <?php
  }elseif(!$_POST['username'] || $_POST['username'] == "") {
    echo '<p align="center">Einen Benutzernamen brauchen wir schon ;-)<br><br><a href="index.php?lang=de&">Zurück</a></p>';
  }elseif(!$_POST['password'] || $_POST['password'] == "") {
    echo '<form action="index.php?lang=de&" method="post">';
    echo '<p align="center">Ein Passwort brauchen wir schon ;-)<br><br>';
    echo '<input type="hidden" name="username" value="'.$_POST['username'].'">';
    echo '<input type="submit" name="zurueck" value="Zurück">';
    echo '</p>';
    echo '</form>';
  }else{
    $password = md5($password);
    $query = @mysql_query("SELECT user, pass FROM users WHERE user = '".$_POST['username']."'") or die('Select ist fehlgeschlagen!');
    $result = @mysql_fetch_array($query) or die('<p align="center">Sorry, aber dieser Benutzername existiert nicht!<br><a href="index.php?lang=de&">Zurück</a></p>');
    if($password != $result['pass']){
      echo '<form action="index.php?lang=de&" method="post">';
      echo '<p align="center">Sorry, aber dieses Passwort ist falsch!<br><br>';
      echo '<input type="hidden" name="username" value="'.$_POST['username'].'">';
      echo '<input type="submit" name="zurueck" value="Zurück"></p>';
      echo '</form>';
     die;
    }else{
      $user = $result['user'];
      session_register('user');
      echo '<p align="center">LogIn erfolgreich! :-)<br><br><a href="sichere_seite.php">Weiter</a></p>';
    }
  }
  ?>
  </body>
  </html>
