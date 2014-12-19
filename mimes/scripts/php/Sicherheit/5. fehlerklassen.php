<?php
	class Fass {
		private $liter = 0;
		private $getraenk = '';
		
		function fuellen($wieviel, $was){			
			if (!is_int($wieviel)) 
			throw new Exception('1. Parameter muss eine Ganzzahl sein!');
		
			
			if (!is_string($was)) 
			throw new Exception('2. Parameter muss ein String sein!');
		
			if ($wieviel < 0 || $wieviel > 20){ 
			throw new FassFehler('Literzahl muss zwischen 0 und 20 sein!');
	
			$this->liter = $wieviel;
			$this->getraenk = $was;
		}
		
		function untersuchen(){
			echo "Fass enthält {$this->liter} Liter {$this->getraenk}";
		}
	}
	
	
	class FassFehler extends Exception{	
	}
	
	$fass = new Fass();		
	try{
		$fass->fuellen(-2, 'Bier');
	}catch(FassFehler $e){
		echo 'Fass-Fehler: '.$e->getMessage();
	}catch (Exception $e){
		echo 'Fehler: ' . $e->getMessage();
	}
	$fass->untersuchen();
?>