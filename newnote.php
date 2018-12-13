<?php
session_start();
include 'inc/checker.php';
include 'inc/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>ShareTo - New Note</title>
	<?php include 'inc/styles.html'; ?>
</head>
<body class="newnotebody">
	<div>
		<?php include 'header.php'; ?>
		<main>
			<form id="newnoteform" method="POST" onsubmit="submitform(event,document.getElementsByClassName('notetitle')[0].innerHTML,document.getElementsByClassName('notenote')[0].innerHTML)">
				<div contenteditable="true" type="text" name="title" placeholder="Title" required class="notetitle"></div><br/><br/>
				<div class="notenote" contenteditable="true" placeholder="Content"></div>
				<br>
				<button class="submit" type="submit">Submit</button>
				<br>
				<div align="center">
					<div id="errors"></div>
				</div>
			</form>
		</main>
	</div>
	<?php include('footer.php'); ?>

	<script type="text/javascript" src="js/senddata.js"></script>
</body>
</html>