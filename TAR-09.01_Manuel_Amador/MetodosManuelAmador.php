<?php
include 'conexion.php';
class clasesql{
    public $mysqli;
    public $resultado;
    /*Esta funcion es para conectar con la base de datos*/
    function __construct()
    {
    $this->mysqli= new mysqli(servidor,usuario,password,basedatos);
    }
    /*Esta es para realizar la consulta que deseas hacer.*/
    function realizarConsultas($sql){
    $this->resultado=$this->mysqli->query($sql);
    }
    /*Devuelve las filas de la consulta realizada*/
    function comprobarSelect(){
    return $this->resultado->num_rows;
    }
    /*
    Devuelve el numero de filas de la consulta realizada
    devuelve 1 o mas cuando hay filas afectadas
    0 cuando no hay filas-1 cuando hay un error
    */
    function comprobar(){
    return $this->mysqli->affected_rows;
    }
    /*
    Devuelve el numero de filas de la consulta realizada
    devuelve 1 o mas cuando hay filas afectadas
    0 cuando no hay filas-1 cuando hay un error
    */
    function extraerFilas(){
    return $this->resultado->fetch_array();
    }
    /*Cierra a sesion de la conexion con la base de datos*/
    function cerrarConexion(){
    $this->mysqli->close();
    }
    /*Devuelve el valor del Id de la fila afectada*/
    function sacarId()
    {
        return $this->mysqli->insert_id;
    }
    function numeroerror(){
        return $this->mysqli->connect_errno;
    }
}
?>