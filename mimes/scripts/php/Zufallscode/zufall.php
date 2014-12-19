<?php

function password($size)
{
	$result = "";

	srand((double)microtime()*1000000);

	for($i=0; $i < $size; $i++)
	{
		$num = rand(48,120);
		while (($num >= 58 && $num <= 64) || ($num >= 91 && $num <= 96))
			$num = rand(48,120);

			$result .= chr($num);
}
return $result;
}

$pw = password(8);

// #################################################

srand ((double)microtime()*1000000);
$randval1 = rand(10,99); //irrgend eine Zahl zwischen 10 und 99
$randval2 = rand(10,99); //irrgend eine Zahl zwischen 10 und 99
$randval3 = rand(10,99); //irrgend eine Zahl zwischen 10 und 99
$randval4 = rand(10,99); //irrgend eine Zahl zwischen 10 und 99
$randval5 = rand(10,99); //irrgend eine Zahl zwischen 10 und 99

//Code zusammen bauen
$Code= $randval1.$randval2.$randval3.$randval4.$randval5;

//Code ausgeben
echo "Dein Code lauted : $Code";


//#######################################################

function rand_string($lng=8) {
	mt_srand((double)microtime()*1000000);
	$charset = "123456789ABCDEFGHIJKLMNPQRSTUVWXYZ";
	$length  = strlen($charset)-1;
	$code    = '';
	for($i=0;$i<$lng;$i++) {
		$code .= $charset{mt_rand(0, $length)};
	}
	return $code;
}

?>