<?php
if (isset($_POST['submit']) && isset($_POST['titel']) && isset($_POST['trainer']) && 
    isset($_POST['dauer']) && $_POST['titel'] != '' && $_POST['trainer'] != '' &&
    (int)$_POST['dauer'] > 0) {
  try {
    $db = new MySQLi('localhost', 'root', '', 'php');
    echo 'Verbindung offen.<br />';
    $sql = 'INSERT INTO trainings (titel, trainer, dauer) VALUES (?, ?, ?)';
    $kommando = $db->prepare($sql);
    $kommando->bind_param('ssi', $_POST['titel'], $_POST['trainer'], $dauer);
    $dauer = (int)$_POST['dauer'];
    $kommando->execute();
    echo 'SQL geschickt. <br />';
    echo $kommando->affected_rows . ' Zeilen betroffen. <br />';
    $db->close();
    echo 'Verbindung zu.<br />';
  } catch (Exception $e) {
    echo 'Fehler: ' . htmlspecialchars($e->getMessage());
  }
}
?>
<form method="POST">
  Thema des Trainings: <input type="text" name="titel" /><br />
  Name des Trainers: <input type="text" name="trainer" /><br />
  Dauer des Trainings: <input type="text" size="2" name="dauer" /><br />
  <input type="submit" name="submit" value="Eintragen!" />
</form>