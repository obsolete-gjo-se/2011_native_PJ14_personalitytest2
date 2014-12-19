<table>
<tr><th>#</th><th>Thema</th><th>Trainer</th><th>Dauer</th></tr>
<?php
  try {
    $db = new MySQLi('localhost', 'root', '', 'php');
    $sql = 'SELECT * FROM trainings';
    $ergebnis = $db->query($sql); 
    while ($zeile = $ergebnis->fetch_object()) {
      printf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
        $zeile->id,
        htmlspecialchars($zeile->titel),
        htmlspecialchars($zeile->trainer),
        $zeile->dauer
      );
    }
    $db->close();
  } catch (Exception $e) {
    echo 'Fehler: ' . htmlspecialchars($e->getMessage());
  }
?>
</table>