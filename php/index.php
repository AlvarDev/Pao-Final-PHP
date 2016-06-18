<?php
     header('Access-Control-Allow-Origin: *'); 

if (isset($_SERVER['HTTP_ORIGIN'])) {  
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");  
    header('Access-Control-Allow-Credentials: true');  
    header('Access-Control-Max-Age: 86400');   
}  
  
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {  
  
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))  
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");  
  
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))  
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");  
}  

     
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
							echo $friendship->getFrienshipList($_POST);
							break;
						case 'manageFrienship':
							echo $friendship->manageFrienship($_POST);
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

	