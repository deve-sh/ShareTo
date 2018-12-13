<?php
session_start();

$array = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

function urlgenerator(){
	
	// Generating a Random URL

	$len=0;
	$random="";

	global $array;
	
	while($len<30){
		$rand=rand(0,sizeof($array));
		$random.=$array[$rand];
		$len++;
	}

	// Further Randomifying

	return md5($random);
}

function noconescape($string){
	// Function to escape a string without a connection available.

	$replacements = array(
		 "\x00"=>'\x00',
		 "\n"=>'\n',
		 "\r"=>'\r',
		 "\\"=>'\\\\',
		 "'"=>"\'",
		 '"'=>'\"',
		 "\x1a"=>'\x1a'
	);

	if($string)
	{
		$string = (string) $string;
		return strtr($string,$replacements);
	}
	else{
		return "";
	}
}

function doublequoteescape($string){
	$replacements = array(
		 "\x00"=>'\x00',
		 "\n"=>'\n',
		 "\r"=>'\r',
		 "\\"=>'\\\\',
		 '"'=>'\"',
		 "\x1a"=>'\x1a'
	);

	if($string)
	{
		$string = (string) $string;
		return strtr($string,$replacements);
	}
	else{
		return "";
	}
}
?>