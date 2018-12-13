<?php
	session_start();
	include 'inc/checker.php';
	include 'inc/config.php';

	if(!$_GET['noteshareurl']){
		header("refresh:0;url=index.php");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Note</title>
	<?php include 'inc/styles.html'; ?>
</head>
<body class="newnotebody">
	<?php
		include 'header.php';
	?>
	<main>
		<script type="text/javascript">
			function getdata(noteshareurl){
				var req=new XMLHttpRequest();

				req.open('GET','getnote.php?noteshareurl='+noteshareurl);

				req.onload = function(){
					json = JSON.parse(req.responseText);

					if(json[0].response_code=="200"){
						// If the query was successful.
						console.log(json);
						document.getElementsByClassName('notetitle')[0].style.display="block";
						document.getElementsByClassName('content')[0].style.display="block";
						document.getElementsByClassName('sharer')[0].style.display="block";
						document.getElementsByClassName('notetitle')[0].innerHTML=json[0].note_title;
						document.getElementsByClassName('content')[0].innerHTML=json[0].note;
						document.getElementById('sharefield').innerHTML=document.URL;
					}
					else if(json[0].response_code=="300"){
						document.getElementById('errors').innerHTML="Invalid Note Share URL.";
						document.getElementsByClassName('notetitle')[0].style.display="none";
						document.getElementsByClassName('content')[0].style.display="none";
						document.getElementsByClassName('sharer')[0].style.display="none";
					}
					else if(json[0].response_code=="500"){
						document.getElementById('errors').innerHTML="No Such Note Found.";
						document.getElementsByClassName('notetitle')[0].style.display="none";
						document.getElementsByClassName('content')[0].style.display="none";
						document.getElementsByClassName('sharer')[0].style.display="none";
					}
					else{
						document.getElementById('errors').innerHTML="Some Error Occurred.";
						document.getElementsByClassName('notetitle')[0].style.display="none";
						document.getElementsByClassName('content')[0].style.display="none";
						document.getElementsByClassName('sharer')[0].style.display="none";
					}
				}

				req.send();
			}

			getdata("<?php echo $_GET['noteshareurl']; ?>");
		</script>

		<div align="center"><div id="errors"></div></div>
		<br>
		<div id="note">
			<div class="notetitle"></div>
			<div class="content"></div>
		</div>
		<br>
		<div class="sharer">
			Share This :
			<br>
			<br> 
			<div id="sharefield"></div><div class="copy" onclick="copyfromdiv('sharefield')" style="cursor: pointer;"><i class="far fa-clipboard"></i></div></div>
		<br>
		<div align="center"><div id="newnoteform"><a href="index.php"><button>Home</button></a></div></div>
	</main>
	<?php
		include 'footer.php';
	?>

	<script type="text/javascript" src="js/render.js"></script>
</body>
</html>