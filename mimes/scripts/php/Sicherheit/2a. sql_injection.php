<html>
<head></head>
<body>
<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
<table>
	<tr>
		<td>Passwort</td>
		<td><input type="text" name="passwort" size="100" /></td>
	</tr>
</table>
<input type="submit" value="Login" />
</form>
<hr />
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
			if (isset($_POST['passwort'])){
				// ' or 'abc'='abc
				// egal';drop table test;#'

				//$passwort = $_POST['passwort'];
				
				$passwort = mysqli_real_escape_string($verbindung, $_POST['passwort']);
				
				$sql = "SELECT * FROM geheim WHERE passwort='{$passwort}'";
								
				echo 'Passwort: ' . $passwort . '<br/>';
				echo 'SQL: ' . $sql . '<br/>';

				$abfrage = mysqli_multi_query($verbindung, $sql);
				if ($ergebnis = mysqli_fetch_assoc($abfrage)){
					echo 'Geheimnis: ' . $ergebnis['geheimnis'];
				}else{
					echo 'Falsches Passwort!';
				}
			}
		}
	}
	mysqli_close($verbindung);
?>
</body>
</html>