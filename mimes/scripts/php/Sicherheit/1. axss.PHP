<?php
  if (isset($_POST['q'])) {
    printf('Ihre Suche nach "%s" ergab 0 Treffer.',
      $_POST['q']);
  }
?>
<form method="post">
  <input type="text" name="q" value="<?php 
  if (isset($_POST['q'])) {
    echo htmlspecialchars($_POST['q']);
  } 
  ?>" />
  <input type="submit" value="Suchen!" />
</form>