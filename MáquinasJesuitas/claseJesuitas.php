<?php
include_once ('clasephp.php');


class claseJesuitas
{
    public $mysqli;
    public $resultado;
    function lugares(){
        $sql = "SELECT lugar FROM maquinas ";
        $this->resultado = $this->mysqli->query($sql);
        if($this->resultado->num_rows>0)
        {
            while($fila = $this->resultado->fetch_array()){
                $data[$fila['lugar']] = $fila['lugar'];
            }
            return $data;
        }
    }
    function comprobar($ip,$password){

//            $consulta = "select * from maquinas where Ip='".$ip."' and Password='".$password."';";
//            echo $consulta.'<br>';
//            if($this->mysqli->query($consulta)){
//                echo 'lo hace';
//                echo $this->mysqli->error.' : '.$this->mysqli->errno.'br';
//            }
//            else{
//                echo $this->mysqli->error.' : '.$this->mysqli->errno.'br';
//            }



        $sql = "select * from maquinas where Ip='".$ip."' and Password='".$password."';";
        $this->resultado = $this->mysqli->query($sql);
        if($this->resultado->num_rows>0)
        {
            return true;
        }

    }
}