<?php
  session_start();
  if (isset($_SESSION['Browser'])) {
    echo 'Browser: ' . htmlspecialchars($_SESSION['Browser']);
  }
?><a href="sess_schreiben.php">Session (erneut) schreiben</a>