<?php
	include "config.php";
	$diary_id = $_POST['i'];
	$result_clients = mysqli_query($mysqli, "DELETE FROM diary_recipes WHERE diary_id = $diary_id");
	$result_clients = mysqli_query($mysqli, "DELETE FROM diary WHERE id = $diary_id");
	
?>