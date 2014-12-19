<?php 
include 'sessionhelpers.inc.php'; 
if (isset($_POST['login'])) 
{ 
    $userid=check_user($_POST['username'], $_POST['userpass']); 
    if ($userid!=false) 
        login($userid); 
    else 
        echo 'Ihre Anmeldedaten waren nicht korrekt!'; 
} 
if (!logged_in()) 
    echo '<form method="post" action="login.php"> 
        <label>Benutzername:</label><input name="username" type="text"><br> 
        <label>Passwort: </label><input name="userpass" type="password" id="userpass"><br> 
        <input name="login" type="submit" id="login" value="Einloggen"> 
    </form>'; 
else 
    echo '<a href="logout.php">Ausloggen</a>'; 
echo '<p /><a href="logged_in.php">Check</a>'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Unbenanntes Dokument</title>
<base href="http://www.ja2.cc/" />
<link href="/mimes/styles/central.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<form class="yform">
        <fieldset class="columnar">
          <legend>Ihre LogIn-Daten</legend>
          <div class="type-text">
            <label for="email">E-Mail</label>
            <input type="text" name="username" id="username" size="20"/>
          </div>
          <div class="type-text">
            <label for="pass">Passwort</label>
            <input type="text" name="userpass" id="userpass" size="20"/>
          </div>
        </fieldset>
      <div class="type-button">
        <input type="submit" value="Senden"  class="submit" id="login" name="login" tabindex="4" />
      </div>        
  </form>
</body>
</html>