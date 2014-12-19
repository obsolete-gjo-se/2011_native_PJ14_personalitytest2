<?php

if ($time_current > $premiumuserseconds)

{    

$date_current = date("d.m.Y");  

$date = explode(".",$date_current);    

$new_premiumuser_to = date("d.m.Y",mktime(0,0,0,$date[1]+$dauer,$date[0],$date[2]));  

mysql_query("UPDATE user SET premiumuser_to = '$new_premiumuser_to' WHERE user = '$user'") OR die(mysql_error());
}

elseif ($time_current < $premiumuserseconds)

{
$date = explode(".",$premiumuser_to);    

$new_premiumuser_to = date("d.m.Y",mktime(0,0,0,$date[1]+$dauer,$date[0],$date[2]));

mysql_query("UPDATE user SET premiumuser_to = '$new_premiumuser_to' WHERE user = '$user'") OR die(mysql_error());
}



$new_payed = $payed + $price;

mysql_query("UPDATE user SET payed = '$new_payed' WHERE user = '$user'") OR die(mysql_error());



//****************************************************************************


<?php

$req = 'cmd=_notify-validate';

foreach ($_POST as $key => $value) {
	$value = urlencode(stripslashes($value));
	$req .= "&$key=$value";
}

$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('www.paypal.com', 80, $errno, $errstr, 30);



// assign posted variables to local variables
$item_name = $_POST['item_name'];
$transid = $_POST['item_number'];
$payment_status = $_POST['payment_status'];
$price = $_POST['mc_gross'];


include('../data/config.php');

$info=mysql_query("SELECT * FROM user WHERE transid = '$transid'") OR die(mysql_error());
while ($row = mysql_fetch_object ($info)) {
	$premiumuser_to_date="$row->premiumuser_to_date";
	$premiumuser_to_time="$row->premiumuser_to_time";
	$payed="$row->payed";
}

$result=mysql_query ("SELECT pricepermonth FROM data") OR die(mysql_error());
while ($row=mysql_fetch_array($result)) {
	$pricepermonth=$row["pricepermonth"];
}

$time_current = time();
$date_current = date("d.m.Y");

$date = explode(".","$premiumuser_to_date");
$time = explode(":","$premiumuser_to_time");

$premiumuser_to = mktime("$time[0]","$time[1]",0,"$date[1]","$date[0]","$date[2]");

$payed_new = ($payed + $price);

$premium_months = ($price / $pricepermonth);


if ($time_current > $premiumuser_to)

{
	$date = explode(".",$date_current);

	$premiumuser_to_date_new = date("d.m.Y",mktime(0,0,0,$date[1],$date[0]+$premium_months,$date[2]));

	$premiumuser_to_time_new = date("H:i");
}

elseif ($time_current < $premiumuser_to)

{

	$date = explode(".",$premiumuser_to_date);

	$premiumuser_to_date_new = date("d.m.Y",mktime(0,0,0,$date[1],$date[0]+$premium_months,$date[2]));
	$premiumuser_to_time_new = $premiumuser_to_time;

}

// Hier kommt ein fehler der Variablen von SQL
mysql_query("UPDATE user SET $premiumuser_to_date = '$premiumuser_to_date_new', $premiumuser_to_time = '$premiumuser_to_time_new', $payed = '$payed_new' WHERE transid = '$transid'") OR die(mysql_error());


?>