<?php

	require 'config.php';
	
	$key = $_POST['key'];
	$func = $_POST['func'];
	if(!empty($key)){

		if(file_exists('controllers/'.$key.'Controller.php') && file_exists('models/'.$key.'.php')){
			require 'controllers/'.$key.'Controller.php';
			require 'models/'.$key.'.php';

			switch ($key) {
				case 'User':
					$user = new UserController(new User());
					switch ($func) {
						case 'registerUser':
							echo $user->registerUser($_POST);
							break;
						case 'loginUser':
							echo $user->loginUser($_POST);
							break;
						case 'getUserProfile':
							echo $user->getUserProfile($_POST);
							break;
						case 'searchUsers':
							echo $user->searchUsers($_POST);
							break;
						default:
							break;
					}
					
					break;
				case 'Friendship':
					$friendship = new FriendshipController(new Friendship());	
					switch ($func) {
						case 'getFrienshipList':
							echo $user->getFrienshipList($_POST);
							break;
						case 'manageFrienship':
							echo $user->manageFrienship($_POST);
							break;
						
						default:
							break;
					}
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

	