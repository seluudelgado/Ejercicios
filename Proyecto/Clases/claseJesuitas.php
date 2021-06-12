<?php
require_once('clasephp.php'); /*Está conectqda con la otra clase que a su vez, a esto se conectan los demás archivos php*/

/*Clase con los métodos que vamos a utilizar para este ejercicio*/
class claseJesuitas extends clasephp
{
    public $mysqli;
    public $resultado;
//Consulta con los lugares que tenemos añadidos en la BBDD
    function consultaLugares()
    {
        $sql = "SELECT * FROM lugares";
        $this->realizarConsultas($sql);
        if ($this->resultado->num_rows > 0) {
            while ($fila = $this->resultado->fetch_array()) {
                $data[$fila['IdLugar']] = $fila['Nombre'];
            }
            return $data;
        }
    }
//Este método comprueba que la contraseña y la IP son correctos, es decir que coinciden con los de la BBDD
    function comprobarLogin($ip, $password, $admin)
    {
        if($admin)
        {
            $sql = "select Password from administrador where IpAdministrador='".$ip."';";
        }
        else
        {
            $sql = "select Password from maquinas where Ip='".$ip."';";
        }

        $this->realizarConsultas($sql);

        if ($this->resultado->num_rows > 0)
        {
            $passwordHashed=$this->resultado->fetch_array()[0];

            if(password_verify($password, $passwordHashed))
            {
                return true;
            }
            return false;
        }
        return false;
    }

    function datosUsuario($ip)
    {
        $sql = "select * from maquinas where Ip='".$ip."';";

        $this->realizarConsultas($sql);

        if ($this->resultado->num_rows > 0)
        {
           $datos = $this->resultado->fetch_array();
           return $datos;
        }
    }
    function consultaVisitaLugares($idLugar)
    {
        $sql = "SELECT * FROM lugares where IdLugar not in (".$idLugar.")";
        $this->realizarConsultas($sql);
        if ($this->resultado->num_rows > 0) {
            while ($fila = $this->resultado->fetch_array()) {
                $data[$fila['IdLugar']] = $fila['Nombre'];
            }

            return $data;
        }
    }

    function saberNombreLugar($id){
        $sql = "SELECT * FROM lugares WHERE IdLugar=".$id.";";
        $this->realizarConsultas($sql);
        if($this->comprobarFilas() > 0)
        {
            $data = $this->extraerFila();
            $nombre = $data["Nombre"];
            return $nombre;
        }
    }

    function anadirVisitas($idJesuita,$idLugar){
        $sql = "INSERT INTO visitas(IdJesuita, IdLugar) VALUES (".$idJesuita.",".$idLugar.");";
        $this->realizarConsultas($sql);
        if($this->filasAfectadas())
        {
            return true;
        }
        return false;
    }
    function comprobarVisitaLugar($idJesuita,$idLugar){
        $sql = "SELECT * FROM  visitas WHERE IdJesuita=".$idJesuita." AND IdLugar=".$idLugar.";";
        $this->realizarConsultas($sql);

        if($this->comprobarFilas()>0)
            return true;
        return false;
    }

    function anadirLugar($anadir)
    {
        $sql = "INSERT INTO lugares (Nombre) VALUES ('".$anadir."')";
        $this->realizarConsultas($sql);
        if($this->numeroError()==0)
            return true;
        return false;

    }

    function anadirJesuita($nombre, $firma, $info)
    {
        $sql = "INSERT INTO Jesuita (Nombre, firma) VALUES ('".$nombre."', '".$firma."')";
        $this->realizarConsultas($sql);

        if($this->numeroError()==0)
        {
            return $this->anadirInfoJesuita($this->insertId(), $info);
        }
        return false;

    }

    function anadirInfoJesuita($id, $info)
    {
        foreach ($info as $item)
        {
            $sql="INSERT INTO informacion_j (IdJesuita, Inform) VALUES (".$id.",'".$item."')";
            $this->realizarConsultas($sql);
            if($this->numeroError()!=0)
                return false;
        }
        return true;

    }

    function existeAdmin()
    {
        $sql="SELECT * FROM administrador";
        $this->realizarConsultas($sql);
        if($this->comprobarFilas()==0)
            return false;
        return true;

    }

    function borrarLugar($idLugar)
    {
        $sql="DELETE FROM lugares WHERE IdLugar=".$idLugar;
        echo $sql;
        $this->realizarConsultas($sql);
    }

    function modificarLugar($id, $nombre)
    {
        $sql="UPDATE lugares SET nombre='".$nombre."' WHERE IdLugar=".$id.";";
        $this->realizarConsultas($sql);
        if($this->numeroError()==0)
            return true;
        return false;

    }
}
?>