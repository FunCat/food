<?php 
	if(isset($_REQUEST['but_reg'])){
		$prov = '';
		$lastname = $_REQUEST['reg_last'];
		$firstname = $_REQUEST['reg_first'];
		$middlename = $_REQUEST['reg_middle'];
		$login = $_REQUEST['reg_log'];
		$password = $_REQUEST['reg_pass'];
		$password2 = $_REQUEST['reg_pass2'];
		if($lastname == '' || $firstname == '' || $middlename == '' || $login == '' || $password == '' || $password2 == ''){
			$prov = "Вы не везде указали данные!";
		}
		else if ($password != $password2){
			$prov = "Пароли не совпадают!";
		}
		else{
			$prov_log_master_prev = mysqli_query($mysqli, "SELECT * FROM masters WHERE login = '$login'");
			$prov_log_master = mysqli_num_rows($prov_log_master_prev);
			$prov_log_client_prev = mysqli_query($mysqli, "SELECT * FROM clients WHERE login = '$login'");
			$prov_log_client = mysqli_num_rows($prov_log_client_prev);

			if($prov_log_master != 0 || $prov_log_client != 0){
				$prov = "Логин уже занят.";
			}
			else{
				$password = md5(md5(trim($password)));

				$result = mysqli_query($mysqli, "INSERT INTO clients (lastname, firstname, middlename, login, pass, data_registration) VALUES ('$lastname','$firstname', '$middlename','$login', '$password', CURDATE())");
				$prov = mysqli_query($mysqli, "SELECT COUNT(login) AS num FROM clients WHERE login =  '$login' AND pass =  '$password'");
				$data = mysqli_fetch_assoc($prov);


				if($data[num] == 1)
				{
					$client_id = mysqli_query($mysqli, "SELECT id FROM clients WHERE login =  '$login'");
					$info = mysqli_fetch_assoc($client_id);
					$i = $info["id"];
					mysqli_query($mysqli, "INSERT INTO clients_charact (clients_id, weight, height, kkal) VALUES ('$i', 0, 0, 0)");
					$prov = "Регистрация прошла успешно!";
				}
				else
				{
					$prov = "Попробуйте чуть позже.";
				}
			}
		}
		
	}

?>