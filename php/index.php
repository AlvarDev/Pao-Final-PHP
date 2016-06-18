<?php

	require 'config.php';
	
	$key = $_GET['key'];
	$func = $_GET['func'];
	if(!empty($key)){

		if(file_exists('controllers/'.$key.'Controller.php') && file_exists('models/'.$key.'.php')){
			require 'controllers/'.$key.'Controller.php';
			require 'models/'.$key.'.php';

			switch ($key) {
				case 'User':
					$user = new UserController(new User());
					switch ($func) {
						case 'registerUser':
							echo $user->registerUser($_GET);
							break;
						case 'loginUser':
							echo $user->loginUser($_GET);
							break;
						case 'getUserProfile':
							echo $user->getUserProfile($_GET);
							break;
						case 'searchUsers':
							echo $user->searchUsers($_GET);
							break;
						default:
							break;
					}
					
					break;
				case 'Friendship':
					$friendship = new FriendshipController(new Friendship());	
					switch ($func) {
						case 'getFrienshipList':
							echo $friendship->getFrienshipList($_GET);
							break;
						case 'manageFrienship':
							echo $friendship->manageFrienship($_GET);
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

	