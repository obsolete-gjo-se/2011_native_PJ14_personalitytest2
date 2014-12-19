<table>
<tr><th>#</th><th>Thema</th><th>Trainer</th><th>Dauer</th></tr>
<?php
  try {
    $db = new MySQLi('localhost', 'root', '', 'php');
    $sql = 'SELECT * FROM trainings';
    $kommando = $db->prepare($sql);
    $kommando->execute();
    
    $kommando->bind_result($id, $thema, $trainer, $dauer);
    
    while ($kommando->fetch()) {
      printf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
        $id, htmlspecialchars($thema), htmlspecialchars($trainer), $dauer
      );
    }
    
    $db->close();
  } catch (Exception $e) {
    echo 'Fehler: ' . htmlspecialchars($e->getMessage());
  }
?>
</table>