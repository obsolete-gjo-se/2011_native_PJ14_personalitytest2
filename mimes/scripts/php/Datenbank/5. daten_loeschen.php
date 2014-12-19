<html>
<head></head>
<body>
<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
ID löschen:
<input type="text" name="id">
<input type="submit" value="Löschen" name="loeschen" />
</form>
<hr/>
<?php
	$server = 'localhost';
	$benutzer = 'root';
	$passwort = '';
	$datenbank = 'phptraining';

	if (!$verbindung = mysqli_connect($server, $benutzer, $passwort)){
		echo 'Verbindungsfehler: ' . mysqli_connect_error($verbindung);
	}else{
		mysqli_select_db($verbindung, $datenbank);
		if (mysqli_error($verbindung)){
			echo 'Fehler: ' . mysqli_error($verbindung);
		}else{
			if (isset($_POST['id'])){			
				$sql = "
					DELETE FROM
						freunde
					WHERE
						ID='{$_POST['id']}'								
				";
				mysqli_query($verbindung, $sql);
				echo $sql . '<br/>';
					echo 'Fehler: ' . mysqli_error($verbindung) . '<br/>';	
				}
			}
			
			$sql = 'SELECT * from freunde ORDER BY nachname';
			$abfrage = mysqli_query($verbindung, $sql);
			echo '<h1>Sie haben ' . mysqli_num_rows($abfrage) . ' Freunde</h1>';
			
			echo '<ul>';
			while ($freund = mysqli_fetch_assoc($abfrage)){
				echo "<li>[{$freund['ID']}] {$freund['vorname']} {$freund['nachname']}</li>";
			}			
			echo '</ul>';
			mysqli_free_result($abfrage);
		}
    
	mysqli_close($verbindung);
?>
</body>
</html>