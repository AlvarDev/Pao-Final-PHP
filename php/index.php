<?php

	require 'config.php';
	
	$key = $_POST['key'];
	if(!empty($key)){

		if(file_exists('controllers/'.$key.'Controller.php') && file_exists('models/'.$key.'.php')){
			require 'controllers/'.$key.'Controller.php';
			require 'models/'.$key.'.php';

			switch ($key) {
				case 'User':
					$user = new AlumnoController(new Alumno());
					echo $user->loginUser($_POST);
					break;
				case 'dota':
					echo "dota";
					break;
				default:
					break;
			}
		}else{
			echo json_encode(array('success' => false, 'message' => 'Controller Not Found'));
		}
	}else{
		echo json_encode(array('success' => false, 'message' => 'No Controller Selected'));
	}

	