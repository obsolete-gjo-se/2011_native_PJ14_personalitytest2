<?php
  if (isset($_COOKIE['PHP'])) {
    echo htmlspecialchars($_COOKIE['PHP']);
  } else {
    echo 'Kein Cookie gefunden.';
  }
?>