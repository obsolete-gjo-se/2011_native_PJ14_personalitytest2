<?php
  if (isset($_POST['Benutzer']) && isset($_POST['Passwort']) &&
    $_POST['Benutzer'] != '' && $_POST['Passwort'] != '') {
    
    $db = mysqli_connect('localhost', 'root', '', 'benutzerverwaltung');  
    
    $sql = sprintf(
      'SELECT * FROM benutzer WHERE name=\'%s\' AND passwort=\'%s\'',
      mysqli_real_escape_string($db, $_POST['Benutzer']), 
      mysqli_real_escape_string($db, $_POST['Passwort'])
    );
    
    $ergebnis = mysqli_query($db, $sql);
    
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