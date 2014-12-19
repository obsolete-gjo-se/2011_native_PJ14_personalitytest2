<?php
  session_start(); 
?>
Setze Session ...
<?php
  $_SESSION['letzterAbruf'] = date('H:i:s');
?>
Session gesetzt.
<script language="JavaScript" type="text/javascript"><!--
document.write("<a href=\"session2.php<?php echo '?' . session_name() . '=' . session_id(); ?>\">Zur zweiten Seite</a>");
//--></script>