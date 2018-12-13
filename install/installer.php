<?php
session_start();
include 'checker.php';
include '../inc/salt.php';
include '../inc/connector.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Installing Script ...</title>
	<?php include 'installstyles.html' ?>
</head>
<body class="installset">
	<main style="background: #ffffff; color: #212121;">
		<?php

			// Installation Variables.

			$host = noconescape($_POST['hostname']);
			$user = noconescape($_POST['username']);
			$pass = noconescape($_POST['password']);
			$dbname = noconescape($_POST['dbname']);
			$subscript = noconescape($_POST['subscript']);

			if($host && $user && $dbname)
			{
				$db = new dbdriver();  // Creating a new database driver.

				if($db->connect($host,$user,$pass,$dbname)==true){
					// Table Queries

					if(!$subscript){
						$subscript="shareto_";
					}

					$db->query("DROP TABLE IF EXISTS ".$subscript."sharetonotes");  // Dropping previously created tables.

					$query1 = "CREATE TABLE ".$subscript."sharetonotes(noteid integer primary key auto_increment,notetitle text, note text,noteshareurl text,time timestamp)";

					$successcounter = 0;

					if($db->query($query1)){
						$successcounter++;
					}

					// File Writing.

					$file1 = fopen($filename1,"w+");
					$file2 = fopen($filename2,"w+");

					$configstring = "<?\n";
					$configstring.= "error_reporting(0);\n";
					$configstring.= "\$host = \"".$host."\";\n";
					$configstring.= "\$password = \"".$pass."\";\n";
					$configstring.= "\$user = \"".$user."\";\n";
					$configstring.= "\$dbname = \"".$dbname."\";\n";
					$configstring.= "\$subscript = \"".$subscript."\";\ninclude('inc/connector.php');\n";
					$configstring.= "\n\$db = new dbdriver();\n\n";
					$configstring.= "\$db -> connect(\$host,\$user,\$password,\$dbname);\n";
					$configstring.= "?>";

					if(fwrite($file1,$configstring)){
						$successcounter++;
					}

					if (fwrite($file2,"1")) {
						$successcounter++;
					}

					fclose($file1);
					fclose($file2);

					if($successcounter==3){
						echo "<br><br>Your Installation Was Successful.<br><br><a href='../index.php'><button class='gohome'>Check It Out</button></a>";
					}
					else{
						echo "<br><br>The Installation wasn't Successful. Kindly Try Again.";
						echo "<br><br><a href='index.php'><button class='gohome'>Back</button></a>";
					}
				}
				else{
					echo "<br><br>Could Not Connect to Database.<br><br>";
				}
			}
			else{
				echo "<br><br>Insufficient information for installation.";
				header("refresh:0;url=index.php");
				exit();
			}
		?>
	</main>
</body>
</html>