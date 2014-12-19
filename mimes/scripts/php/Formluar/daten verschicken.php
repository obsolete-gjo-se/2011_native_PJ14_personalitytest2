<html>
<head>
	<title>Formular</title>
</head>
<body>
	<?php
		$fehler = '';
	
		if (isset($_POST['email'])){
			if (trim($_POST['email']) != ''){
				$email = $_POST['email'];
			}else{
				$fehler = $fehler . 'Email angeben!<br/>';
			}
			
			if (isset($_POST['nachricht']) && trim($_POST['nachricht']) != ''){
				$nachricht = $_POST['nachricht'];
			}else{
				$fehler = $fehler . 'Nachricht angeben!<br/>';
			}
			
			if ($fehler != ''){
				echo $fehler;
			}else{
				echo 'Daten verschicken: ' . $_POST['email'] . ' ' . $_POST['nachricht'];
				
			}			
		}
	?>
	<hr/>
	<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
		Email-Adresse<br/>
		<input type="text" name="email" value="<?php echo $email ?>" /><br/>
		Nachricht:<br/>
		<textarea rows="10" cols="50" name="nachricht"><?php echo $nachricht ?></textarea><br/>
		<input type="submit" value="Abschicken" />
	</form>
</body>
</html>