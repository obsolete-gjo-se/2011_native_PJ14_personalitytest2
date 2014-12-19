<?php
  session_start();
  
  if (isset($_SESSION['letzterAbruf'])) {
    echo "Letzter Abruf: {$_SESSION['letzterAbruf']}";
  } else {
    echo 'Erster Besuch?!';
  }
?>
<a href="session1.php">Zur&uuml;ck</a>