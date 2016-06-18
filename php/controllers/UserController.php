<?php 

class UserController {

	protected $user = null;

	public function __construct(User $user){
		$this->user  = $user;
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function registerUser($req){
		$user = $this->user->registerUser($req);
		if(empty($user)){
			return json_encode(array(
			'success' => false, 
			'message' => 'Not Found'));
		}

		return json_encode(array(
			'success' => true, 
			'info' => $user));
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	public function loginUser($req){
		$user = $this->user->loginUser($req);
		if(empty($user)){
			return json_encode(array(
			'success' => false, 
			'message' => 'Not Found'));
		}

		return json_encode(array(
			'success' => true, 
			'info' => $user));
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function getUserProfile($req){
		$user = $this->user->getUserProfile($req);
		if(empty($user)){
			return json_encode(array(
			'success' => false, 
			'message' => 'Not Found'));
		}

		return json_encode(array(
			'success' => true, 
			'info' => $user));
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function searchUsers($req){
		$user = $this->user->searchUsers($req);
		if(empty($user)){
			return json_encode(array(
			'success' => false, 
			'message' => 'Not Found'));
		}

		return json_encode(array(
			'success' => true, 
			'info' => $user));
	}

}
