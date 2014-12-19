<?php
	function exception_erzeuger($nummer, $string){
		throw new ErrorException($string, $nummer);
	}
	set_error_handler('exception_erzeuger');

	try{
		include('gibtsnicht.txt');
	}catch(Exception $e){
		echo 'FEHLER: ' . $e->getMessage() . '<br/>';
		echo 'FEHLERCODE: ' . $e->getCode() . '<br/>';
		exit();		
	}
	
	echo 'Hallo!';
?>