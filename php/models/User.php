<?php
require_once "conf/ConexionDB.php";
class User {

	protected $user;
    protected $users = array();
	protected $response;

    public function registerUser($req){

        $email = $req['email'];
        $password = $req['password'];
        $nombre = $req['nombre'];
        $profesion = $req['profesion'];
        $foto = $req['foto'];

    	$sql = "CALL sp_register_new_user('$email','$password','$nombre','$profesion','$foto');";
    	$cn = new ConexionDB();
		$conexion = $cn->getConexionDB();
        mysqli_set_charset($conexion, "utf8");
    	$response = mysqli_query($conexion,$sql);
    	mysqli_close($conexion);

    	if(mysqli_num_rows($response)>0){
    		return true;
    	} 

    	return null;
    }


    public function loginUser($req){
        $email = $req['email'];
        $password = $req['password'];

        $sql = "CALL sp_login('$email','$password');";
        $cn = new ConexionDB();
        $conexion = $cn->getConexionDB();
        mysqli_set_charset($conexion, "utf8");
        $response = mysqli_query($conexion,$sql);
        mysqli_close($conexion);

        if(mysqli_num_rows($response)>0){

            $r = mysqli_fetch_array($response);
                
            $user = new stdClass();
            $user->codusu = $r['codusu'];

            return $user;
        } 

        return null;
    }

    public function getUserProfile($req){
        $codusu = $req['codusu'];
        $codami = $req['codami'];
        $type = $req['type'];

        $sql = "CALL sp_get_profile('$codusu','$codami','$type');";
        $cn = new ConexionDB();
        $conexion = $cn->getConexionDB();
        mysqli_set_charset($conexion, "utf8");
        $response = mysqli_query($conexion,$sql);
        mysqli_close($conexion);

        if(mysqli_num_rows($response)>0){

            $r = mysqli_fetch_array($response);
                
            $user = new stdClass();
            $user->nomusu = $r['nomusu'];   
            $user->profesion = $r['profesion'];
            $user->foto = $r['foto'];
            $user->estado = (int) $r['estado'];
            return $user;
        } 

        return null;
    }

    public function searchUsers($req){
        $nombre = $req['nombre'];

        $sql = "CALL sp_search_users('%$nombre%');";
        $cn = new ConexionDB();
        $conexion = $cn->getConexionDB();
        mysqli_set_charset($conexion, "utf8");
        $response = mysqli_query($conexion,$sql);
        mysqli_close($conexion);

        if(mysqli_num_rows($response)>0){
                
            while ($r = mysqli_fetch_array($response)) {
                $user = new stdClass();
                $user->codusu = $r['codusu'];
                $user->nomusu = $r['nomusu'];
                $user->foto = $r['foto'];
                $this->users[] = $user;
            }

            return $this->users;
        } 

        return null;
    }




}

    