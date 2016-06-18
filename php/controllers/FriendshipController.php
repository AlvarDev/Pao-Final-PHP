<?php 

class UserController {

	protected $friendship = null;

	public function __construct(Friendship $friendship){
		$this->friendship  = $friendship;
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function getFrienshipList($req){
		$friendship = $this->friendship->getFrienshipList($req);
		if(empty($friendship)){
			return json_encode(array(
			'success' => false, 
			'message' => 'Not Found'));
		}

		return json_encode(array(
			'success' => true, 
			'info' => $friendship));
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function manageFrienship($req){
		$friendship = $this->friendship->manageFrienship($req);
		if(empty($friendship)){
			return json_encode(array(
			'success' => false, 
			'message' => 'Not Found'));
		}

		return json_encode(array(
			'success' => true, 
			'info' => $friendship));
	}

}
