<?php
	session_start();

	include 'inc/checker.php';
	include 'inc/config.php';
	include 'inc/salt.php';

	function generator(){ // Extensive URL Generator.
		$url=urlgenerator();
		
		global $db;  // Global Scope of variable $db.

		if($db->numrows($db->query("SELECT * FROM ".$subscript."sharetonotes WHERE noteshareurl='".$url."'"))==0)
		{
			return $url;
		}
		else
		{
			return generator();   // Recursive.
		}
	}

	if($_GET['title']!="" && $_GET['content']!="")
	{
		$title = $_GET['title'];
		$content = $_GET['content'];

		$content = noconescape($content);

		$title = noconescape($title);

		$shareurl = generator();

		if($db->query("INSERT INTO ".$subscript."sharetonotes(notetitle,note,noteshareurl) VALUES('".$title."','".$content."','".$shareurl."')")){
			echo "[{\"response_code\":\"200\",\"shareurl\":\"".$shareurl."\"}]";  // Success
		}
		else{
			echo "[{\"response_code\":\"400\"}]"; // Error Occured
		}
	}
	else{
		echo "[{\"response_code\":\"500\"}]"; // Insufficient Information.
	}

?>