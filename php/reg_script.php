<?php 
	include "config.php";
	if(isset($_POST['my_lastname'])){
		$prov = '';
		$lastname = $_POST['my_lastname'];
		$firstname = $_POST['my_firstname'];
		$login = $_POST['my_log'];
		$password = $_POST['my_pass'];
		$password2 = $_POST['my_pass2'];
		

		$prov_log_master_prev = mysqli_query($mysqli, "SELECT * FROM masters WHERE login = '$login'");
		$prov_log_master = mysqli_num_rows($prov_log_master_prev);
		$prov_log_client_prev = mysqli_query($mysqli, "SELECT * FROM clients WHERE login = '$login'");
		$prov_log_client = mysqli_num_rows($prov_log_client_prev);

		if($prov_log_master != 0 || $prov_log_client != 0){
			echo 'Логин уже занят!';
		}
		else
		{
			$password = md5(md5(trim($password)));

			$result = mysqli_query($mysqli, "INSERT INTO clients (lastname, firstname, login, pass, data_registration, permissions_id) VALUES ('$lastname','$firstname','$login', '$password', CURDATE(), 4)");
			$prov = mysqli_query($mysqli, "SELECT COUNT(login) AS num FROM clients WHERE login = '$login' AND pass =  '$password'");
			$data = mysqli_fetch_assoc($prov);

			if($data[num] == 1)
			{
				$client_id = mysqli_query($mysqli, "SELECT id FROM clients WHERE login =  '$login'");
				$info = mysqli_fetch_assoc($client_id);
				$i = $info["id"];
				mysqli_query($mysqli, "INSERT INTO clients_charact (clients_id, weight, height, kkal) VALUES ('$i', 0, 0, 0)");
				SetCookie("name", "$firstname", time()+4800);
				SetCookie("log", "$login", time()+4800);
				SetCookie("perm", "4", time()+4800);
			}
			else
			{
				$prov = "Попробуйте чуть позже.";
			}
		}
	}
?>