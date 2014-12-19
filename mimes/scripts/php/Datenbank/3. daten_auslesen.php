<?php
	 $server = 'localhost';
	 $benutzer = 'root';
	 $passwort = '';
	 $datenbank = 'phptraining';
	 
	 $verbindung = @mysqli_connect($server, $benutzer, $passwort);
	 
	 if ($verbindung){
	 	mysqli_select_db($verbindung, $datenbank);
	 	
	 	if(mysqli_error($verbindung)){
	 		echo 'Fehler: ' . mysqli_error($verbindung);
	 	}else{
			$sql = 'SELECT * from freunde ORDER BY nachname';
			$abfrage = mysqli_query($verbindung, $sql);
			echo '<h1>Sie haben ' . mysqli_num_rows($abfrage) . ' Freunde</h1>';
			
			echo '<ul>';
			while ($freund = mysqli_fetch_assoc($abfrage)){
				echo "<li>{$freund['vorname']} {$freund['nachname']}</li>";
			}
			echo '</ul>';
			mysqli_free_result($abfrage);
	 	}	 		 	
	 }else{
	 	echo 'Verbindungsfehler: ' . mysqli_connect_error($verbindung);
	 }
	mysqli_close($verbindung);
?>