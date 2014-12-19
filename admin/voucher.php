<?php
echo 'Zufallszahlen für Voucher schreiben';

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