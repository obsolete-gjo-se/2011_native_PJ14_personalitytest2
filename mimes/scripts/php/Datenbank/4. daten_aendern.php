<html>
<head></head>
<body>
<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
<table>
	<tr>
		<td>ID</td>
		<td><input type="text" name="id" /></td>
	</tr>
	<tr>
		<td>Vorname</td>
		<td><input type="text" name="vorname" /></td>
	</tr>
	<tr>
		<td>Nachname</td>
		<td><input type="text" name="nachname" /></td>
	</tr>
</table>
<input type="submit" value="Ändern" name="aendern" />
</form>
<hr/>
<?php
	$server = 'localhost';
	$benutzer = 'root';
	$passwort = '';
	$datenbank = 'phptraining';

	$verbindung = mysqli_connect($server, $benutzer, $passwort);
		
	if ($verbindung){
		mysqli_select_db ($verbindung, $datenbank);
	
		if(mysqli_error($verbindung)){
			echo 'Fehler: ' . mysqli_error($verbindung);
		}else{
			if (isset($_POST['id'])){			
				$sql = "
					UPDATE
						freunde
					SET
						vorname='{$_POST['vorname']}',
						nachname='{$_POST['nachname']}'
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