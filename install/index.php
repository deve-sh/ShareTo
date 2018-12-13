<?php
	session_start();
	include 'checker.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Install ShareTo</title>
	<?php include 'installstyles.html'; ?>
</head>
<body class="installset">
	<main>
		<br>
		<div class="header">
			Install ShareTo
		</div>
		<br>
		<div align="center">
			<div id="installform">
			<form action="installer.php" method="POST">
				<h3>DataBase Details</h3>
				Only MySQL Improved Databases are Supported.
				<br><br>
				<input type="text" required name="hostname" placeholder="Host Name">
				<br><br>
				<input type="text" name="username" placeholder="User Name" required>
				<br><br>
				<input type="password" name="password" placeholder="Password">
				<br><br>
				<input type="text" name="dbname" placeholder="Database Name" required>
				<br><br>
				<input type="text" name="subscript" placeholder="Subscript (Default : shareto_)">
				<br><br>
				<button type="submit" class="install">INSTALL</button>
				<br>
			</form>
			</div>
		</div>
	</main>
</body>
</html>