<?php
  if (isset($_COOKIE['Cookietest'])) {
    setcookie('Cookietest', '', time() - 365*24*60*60);
    echo 'Cookies werden unterst&uuml;tzt!';
  } else {
    echo 'Cookies werden nicht unterst&uuml;tzt!';
  }
?>