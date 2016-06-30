<?php

//Connect to BD
	$host = "mysql.hostinger.ru";
	$user = "u553990008_dnosa";
	$password = "SjxKDah2fY3c";
	$db = "u553990008_food";

	$mysqli = new mysqli("$host", "$user", "$password", "$db");
	if($mysqli->connect_error){
		die('Connect Error ('. $mysqli->connect_errno . ')' . $mysqli->connect_error);
	}
	if(!$mysqli->real_connect($host, $user, $password, $db)){
		die('Connect Error ('. $mysqli->connect_errno . ')' . $mysqli->connect_error);
	}
	else{
		//echo "OK!";
	}
//----------------------------------------------------

//Exit from DailyFood by clicking button but_exit
	if(isset($_REQUEST["but_exit"]))
	{
		SetCookie("name","",time()-4800);
		SetCookie("log","",time()-4800);
		SetCookie("perm", "", time()-4800);
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
//-----------------------------------------------------

?>