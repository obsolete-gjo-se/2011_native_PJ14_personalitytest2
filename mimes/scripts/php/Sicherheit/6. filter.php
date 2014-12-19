<?php
	// Zahl filtern
//	$zahl = 6;
//	if(filter_var($zahl, FILTER_VALIDATE_INT)){
//		echo $zahl . ' ist eine gültige Zahl';
//	}else{
//		echo $zahl . ' ist keine Zahl';
//	}

	// Mail filtern
//	$email = 'test@test.de';
//	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
//		echo $email . ' ist eine gültige Mailadresse!<br/>';
//	}else{
//		echo $email . ' ist keine korrekte Mailadresse!<br/>';
//	}

	// URL filtern		
//	$seite = 'http://www.bischoff-software.de';
//	if(filter_var($seite, FILTER_VALIDATE_URL)){
//		echo 'URL korrekt<br/>';
//	}else{
//		echo 'Falsches URL-Format<br/>';
//	};
	
	// IP filtern
//	$seite = '127.11110.0.1';
//	if(filter_var($seite, FILTER_VALIDATE_IP)){
//		echo 'IP korrekt<br/>';
//	}else{
//		echo 'Falsches IP-Format<br/>';
//	}
	
	// Zahl mit Optionen filtern
//	$optionen = array('options' => array('min_range' => 500, 'max_range' => 600));
//	$zahl = 612;
//	if(filter_var($zahl, FILTER_VALIDATE_INT, $optionen)){
//		echo 'Zahl ist zwischen 500 und 600<br/>';
//	}else{
//		echo 'Zahl muss zwischen 500 und 600 liegen<br/>';
//	}
	
	// Variablen aus GET abfragen und filtern
//	if(filter_has_var(INPUT_GET, 'zahl')){
//		echo 'Parameter zahl ist vorhanden ';
//		if(filter_input(INPUT_GET, 'zahl', FILTER_VALIDATE_INT)){
//			echo 'und gültig!';
//		}else{
//			echo 'aber ungültig...';
//		}		
//	}else{
//		echo 'Parameter zahl ist nicht vorhanden<br/>';
//	}
?>