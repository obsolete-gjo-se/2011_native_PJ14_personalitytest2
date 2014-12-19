<?php
  if (isset($_GET['url'])) {
    $url = nl2br($_GET['url']);
    //echo $url;
    header("Location: $url");
  }
?>