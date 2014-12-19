<?php
  session_start();
  $_SESSION['Browser'] = $_SERVER['HTTP_USER_AGENT'];
  session_regenerate_id();
?><a href="sess_lesen.php">Session auslesen</a>