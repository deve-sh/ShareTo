<?php
	// File To Check if the application has been installed.

	$filename1 = "inc/config.php";
	$filename2 = "inc/confirm.txt";

	$file1 = fopen($filename1,"r");
	$file2 = fopen($filename2,"r");

	$string1 = fread($file1,filesize($filename1));
	$string2 = fread($file2,filesize($filename2));

	fclose($file1);
	fclose($file2);
	
	if($string1=="0" || $string2=="0"){
		header("refresh:0;url=install");
		exit();
	}  // Redirect if the script hasn't been installed.
?>