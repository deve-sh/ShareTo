<?php
	session_start();
	include 'inc/checker.php';
	include 'inc/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>ShareTo - Home</title>
	<?php include 'inc/styles.html'; ?>
</head>
<body class="mainbody">
	<?php
		include 'header.php';
	?>
	<main align='center'>
		<div class='bod' align="center">
			<h2>Hey There.</h2>
			This place lets you share thoughts and things anonymously, no one will know.<br><br>
			
			<a href="newnote.php"><button class='newnotebutton'>Make One</button></a>
		</div>
	</main>
	<?php
		include 'footer.php';
	?>
</body>
</html>