<?php
	include "config.php";
	if(isset($_POST['log'])){
		$logres = $_POST['log'];
		$result_clients = mysqli_query($mysqli, "SELECT id FROM clients WHERE login =  '$logres'");
		$bol_enter_client = mysqli_fetch_assoc($result_clients);
		$client_id = $bol_enter_client['id'];
		$id = $_POST['id'];
		echo $client_id;
		echo $id;
		mysqli_query($mysqli, "INSERT INTO favourite_recipes (clients_id, recipes_id, tag) VALUES ($client_id, $id, '')");
	}
?>