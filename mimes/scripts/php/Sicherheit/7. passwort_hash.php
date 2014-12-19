<html>
<head></head>
<body>
<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
<table>
	<tr>
		<td>Benutzer</td>
		<td><input type="text" name="benutzer" size="100"/></td>
	</tr>
	<tr>
		<td>Passwort</td>
		<td><input type="text" name="passwort" size="100"/></td>
	</tr>
</table>
<input type="submit" value="Login" />
</form>
<hr/>
<?php
	 $server = 'localhost';
	 $benutzer = 'root';
	 $passwort = '';
	 $datenbank = 'phptraining';
	 
	 $verbindung = mysqli_connect($server, $benutzer, $passwort);
	 
	 if ($verbindung){
	 	mysqli_select_db($verbindung, $datenbank);
	 	
	 	if(mysqli_error($verbindung)){
	 		echo 'Fehler: ' . mysqli_error($verbindung);
	 	}else{
	 		if (isset($_POST['passwort']) && isset($_POST['benutzer'])){
				$benutzer = mysqli_real_escape_string($verbindung, $_POST['benutzer']);
				$passwort = mysqli_real_escape_string($verbindung, $_POST['passwort']);
				
				echo 'Benutzer: ' . $benutzer . '<br/>';
				echo 'Passwort: ' . $passwort . '<br/>';
				
				echo 'Passwort-Hash: ' . md5($passwort . $benutzer) . '<br/>';
				
				$passwort = md5($passwort . $benutzer);
				
				$sql = "SELECT * FROM users WHERE benutzer='{$benutzer}' AND passwort='{$passwort}'";
				echo 'SQL: ' . $sql . '<br/>';
				
				$abfrage = mysqli_query($verbindung, $sql);
				if ($ergebnis = mysqli_fetch_assoc($abfrage)){
					echo 'Sie sind eingeloggt!';
				}else{
					echo 'Falsche Daten!';
				}
	 		}
	 	}	 		 	
	 }
	 mysqli_close($verbindung);
?>
</body>
</html>