<?php
  if (isset($_POST['Benutzer']) && isset($_POST['Passwort']) &&
    $_POST['Benutzer'] != '' && $_POST['Passwort'] != '') {
    
    $db = mysqli_connect('localhost', 'root', '', 'benutzerverwaltung');  
    
    $sql = 'SELECT * FROM benutzer WHERE name=? AND passwort=?';
    
    $kommando = mysqli_prepare($db, $sql);
    
    mysqli_stmt_bind_param($kommando, 'ss', $_POST['Benutzer'], $_POST['Passwort']);
    
    $ergebnis = mysqli_stmt_execute($kommando);
    
    if (mysqli_num_rows($ergebnis) > 0) {
      $zeile = mysqli_fetch_assoc($ergebnis);
      $benutzername = htmlspecialchars($zeile['name']);
      echo "<p>Login erfolgreich als $benutzername!</p>";
    } else {
      echo '<p>Login gescheitert!</p>';
    }
    
    echo htmlspecialchars($sql);
  }
?>
<form method="post">
  Benutzername: <input type="text" name="Benutzer" /> <br />
  Passwort: <input type="text" name="Passwort" /><br />
  <input type="submit" value="Login" />
</form>