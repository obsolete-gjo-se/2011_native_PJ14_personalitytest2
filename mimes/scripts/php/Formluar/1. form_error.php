<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Unbenanntes Dokument</title>
</head>

<body>
<?php 
	// wurde der Absendebutton gedrückt:
	if (isset($_POST['submit'])){
		//Variablensetzung Error_xxx = leer, damit Gesamte Fehlerüberprüfung
		$e_text1 = '';
		$e_email = '';
		$e_password = '';
		$e_dropdown = '';
		$e_radio = '';
		
		//Texteingabefeld & Textarea:
		if (isset($_POST['text1']) && !is_array($_POST['text1']) && trim($_POST['text1'] != '')){
			$text1 = htmlspecialchars($_POST['text1']);}
			else{$e_text1 = 'Bitte Inhalt Text1 angeben!';}
		//Email:
		if (isset($_POST['email']) && !is_array($_POST['email']) && trim($_POST['email'] != '') &&(filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL))){
			$email = htmlspecialchars($_POST['email']);}
			else{$e_email = 'Bitte korrekte Emailadresse angeben!';}
		//Passwort: (min 6 Zeichen)
		if (isset($_POST['password']) && !is_array($_POST['password']) && trim($_POST['password'] != '') && strlen($_POST['password']) >= 6 ){
			$password = md5(htmlspecialchars($_POST['password']));}
			else{$e_password = 'Bitte geben Sie ein gültiges Passwort mit mind. 6 Zeichen ein!';}
		//Dropdown:
		if (isset($_POST['dropdown']) && !is_array($_POST['dropdown']) && trim($_POST['dropdown'] != '')){
			$dropdown = htmlspecialchars($_POST['dropdown']);}
			else{$e_dropdown = 'Bitte treffen Sie eine Auswahl!';}			
		//Radio:
		if (isset($_POST['radio']) && !is_array($_POST['radio']) && trim($_POST['radio'] != '')){
			$radio = htmlspecialchars($_POST['radio']);}
			else{$e_radio = 'Bitte treffen Sie eine Auswahl!';}		
		//Check:
		if (isset($_POST['check']) && !is_array($_POST['check']) && trim($_POST['check'] == 'value')){
			$check = htmlspecialchars($_POST['check']);}
			else{$e_check = 'Bitte treffen Sie eine Auswahl!';}					
		}
?>


</body>
</html>