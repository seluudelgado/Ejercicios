<?php
require_once('conexion.php');
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

        function comprobarFilas()
        {
            return $this->resultado->num_rows;
        }
        function filasAfectadas()
        {
            return $this->mysqli->affected_rows;

        }
        function numeroError(){
            return $this->mysqli->errno;
        }


    }
?>
