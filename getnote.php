<?php
	session_start();

	// API TO PRESENT THE DETAILS OF A NOTE.
	
	include 'inc/checker.php';
	include 'inc/config.php';
	include 'inc/salt.php';

	$noteshareurl=$_GET['noteshareurl'];

	if($noteshareurl!="")
	{
		$noteshareurl = $db->escape($noteshareurl);

		if($db->numrows($db->query("SELECT * FROM ".$subscript."sharetonotes WHERE noteshareurl='".$noteshareurl."'"))>0){

			$note = $db->fetch($db -> query("SELECT * FROM ".$subscript."sharetonotes WHERE noteshareurl='".$noteshareurl."'"));

			echo "[{\"response_code\":\"200\","; // Successful
			echo "\"noteid\":\"".doublequoteescape($note['noteid'])."\",";
			echo "\"note_title\":\"".doublequoteescape($note['notetitle'])."\",";
			echo "\"note\":\"".doublequoteescape($note['note'])."\"";
			echo "}]";
		}
		else{
			echo "[{\"response_code\":\"500\"}]";  // Not Found.
		}
	}
	else{
		echo "[{\"response_code\":\"300\"}]";      // Invalid Note Sharing URL.
	}
?>