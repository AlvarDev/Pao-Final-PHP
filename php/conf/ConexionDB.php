<?php
 class ConexionDB{

 	const SERVER = '192.168.0.22';
 
	const USER = 'root';
 	const PASS = 'root';//'pelio1';
 
	const DATABASE = 'demophp';
 	private $link = null;

 	public function getConexionDB(){
 
		$this->link = mysqli_connect(self::SERVER, self::USER, self::PASS, self::DATABASE);
 	
	if(!$this->link){
 			return null;
 		}
 		return $this->link;
 	}

}