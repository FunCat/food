<?php 
	$prov = "";
	if(isset($_REQUEST['acc_update'])){
		
		$logres = $_COOKIE['log'];
		$lastres = $_REQUEST['my_lastname'];
		$nameres = $_REQUEST['my_firstname'];
		$middres = $_REQUEST['my_middlename'];
		$telres = $_REQUEST['my_tel'];
		$mailres = $_REQUEST['my_mail'];

		if($mailres == "") $prov = "Вы не ввели mail";

		$result_clients = mysqli_query($mysqli, "SELECT * FROM clients WHERE login =  '$logres'");
		$bol_enter_client = mysqli_num_rows($result_clients);

		$result_masters = mysqli_query($mysqli, "SELECT * FROM masters WHERE login =  '$logres'");
		$bol_enter_master = mysqli_num_rows($result_masters);

		if($bol_enter_master == 1){
			mysqli_query($mysqli, "UPDATE masters SET lastname = '$lastres', firstname = '$nameres', middlename = '$middres', telephone = 'telres', mail = '$mailres' WHERE login =  '$logres'");	
		}
		else if($bol_enter_client == 1){
			mysqli_query($mysqli, "UPDATE clients SET lastname = '$lastres', firstname = '$nameres', middlename = '$middres', telephone = 'telres', mail = '$mailres' WHERE login =  '$logres'");
		}

	}



?>