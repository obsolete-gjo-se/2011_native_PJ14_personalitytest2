<html>
<head></head>
<body>
<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
<table>
	<tr>
		<td>Vorname</td>
		<td><input type="text" name="vorname" /></td>
	</tr>
	<tr>
		<td>Nachname</td>
		<td><input type="text" name="nachname" /></td>
	</tr>
</table>
<input type="submit" value="Speichern" name="speichern" />
</form>
<hr/>
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
	 		if (isset($_POST['vorname'])){
	 			$sql = "
	 				INSERT INTO
	 					freunde(vorname, nachname)
	 				VALUES('{$_POST['vorname']}', '{$_POST['nachname']}')
	 			";
	 			$abfrage = mysqli_query($verbindung, $sql);	 			
	 			echo 'SQL: ' . $sql;
	 			echo mysqli_error($verbindung);
	 		}
	 		
	 		$sql = "SELECT * FROM freunde ORDER BY nachname";
	 		$abfrage = mysqli_query($verbindung, $sql);
	 		echo '<h1>Sie haben ' . mysqli_num_rows($abfrage) . ' Freunde</h1>';
	 		
	 		echo '<ul>';
	 		while($freund = mysqli_fetch_assoc($abfrage)){	 			
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
</body>
</html>