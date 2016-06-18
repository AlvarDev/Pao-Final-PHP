<?php
require_once "conf/ConexionDB.php";
class Friendship {

    protected $friend;
	protected $friends = array();
	protected $response;

    public function getFrienshipList($req){
        $codusu = $req['codusu'];

        $sql = "CALL sp_get_list_friends('$codusu');";
        $cn = new ConexionDB();
        $conexion = $cn->getConexionDB();
        mysqli_set_charset($conexion, "utf8");
        $response = mysqli_query($conexion,$sql);
        mysqli_close($conexion);

        if(mysqli_num_rows($response)>0){
                
            while ($r = mysqli_fetch_array($response)) {
                $friend = new stdClass();
                $friend->codusu = $r['codusu'];
                $friend->nomusu = $r['nomusu'];
                $friend->foto = $r['foto'];
                $friend->estado = int $r['estado'];
                $this->friends[] = $friend;
            }

            return $this->friends;
        } 

        return null;
    }


    public function manageFrienship($req){
        $codusu = $req['codusu'];
        $codami = $req['codami'];
        $estado = $req['estado'];
        $action = $req['action'];
        
        $sql = "CALL sp_manage_friendship('$codusu','$codami','$estado','$action');";
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

}

    