<?php
    include_once ('conexion.php');
    class clasephp
    {
        public $mysqli;
        public $resultado;
        function __construct()
        {
            $this->mysqli = new mysqli(servidor, usuario, password, basedatos);
        }

        function realizarConsultas($sql)
        {
            $this->resultado = $this->mysqli->query($sql);
        }

        function extraerFila(){
            return $this->resultado->fetch_array();
        }

        function comprobarSelect()
        {
            return $this->resultado->num_rows;
        }



    }
?>
