<?php 
	include "config.php";
	include "cookie.php";
	if(isset($_POST['my_lastname'])){
		
		$logres = $_COOKIE['log'];
		$lastres = $_POST['my_lastname'];
		$nameres = $_POST['my_firstname'];
		$middres = $_POST['my_middlename'];
		$telres = $_POST['my_tel'];
		$mailres = $_POST['my_mail'];

		$result_clients = mysqli_query($mysqli, "SELECT * FROM clients WHERE login =  '$logres'");
		$bol_enter_client = mysqli_num_rows($result_clients);

		$result_masters = mysqli_query($mysqli, "SELECT * FROM masters WHERE login =  '$logres'");
		$bol_enter_master = mysqli_num_rows($result_masters);

		if($bol_enter_master == 1){
			mysqli_query($mysqli, "UPDATE masters SET lastname = '$lastres', firstname = '$nameres', middlename = '$middres', telephone = '$telres', mail = '$mailres' WHERE login =  '$logres'");	
		}
		else if($bol_enter_client == 1){
			mysqli_query($mysqli, "UPDATE clients SET lastname = '$lastres', firstname = '$nameres', middlename = '$middres', telephone = '$telres', mail = '$mailres' WHERE login =  '$logres'");
		}

	}



?>