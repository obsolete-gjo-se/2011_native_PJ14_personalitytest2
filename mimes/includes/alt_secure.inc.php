<?php
// Zugang nur nach Bezahlung


// Zugang nur für Mitglieder
$sql_secure = "SELECT om FROM sitemap WHERE path='" . $path . "' AND om=1 LIMIT 1";
$result_secure = mysql_query ($sql_secure);
if (mysql_num_rows ($result_secure) == 1) 
{
	$sql_logdin = "SELECT s_id FROM user WHERE s_id='" . session_id () . "' LIMIT 1";
	$result_logdin = mysql_query ( $sql_logdin );
	if (mysql_num_rows ( $result_logdin ) != 1) 
	{
		header("location:http://www.ja2.cc/de/legal/login.php");
	} 
	else
	{
		//echo '	Seite ist om<br />
		//			User ist eingeloggt<br />
		//			Sichere Seite wird angezeigt';
	}
} 
else 
{
	//echo '		Seite ist nicht om<br />
	//				und wird direkt angezeigt';
}
?>