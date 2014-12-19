<html>
<head></head>
<body>
<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
<table>
	<tr>
		<td>Name</td>
		<td><input type="text" name="name" size="100"/></td>
	</tr>
</table>
<input type="submit" value="Abschicken" />
</form>
<hr/>
<?php
	// <script>alert('Buh!')</script>
	// <script>window.location.href='http://www.google.de'</script>

	echo 'Du heiﬂt ' . $_POST['name'] . '<br/>';	
	echo '<hr/>';
	echo 'Du heiﬂt ' . htmlspecialchars($_POST['name']) . '<br/>';
	echo '<hr/>';
	echo 'Du heiﬂt ' . strip_tags($_POST['name'], '<h1>');	
?>
</body>
</html>