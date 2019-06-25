<?php
include_once 'functions.php';
/**
 * Esta clase contiene las funciones necesarias para gestionar la tabla usuarios de la base de datos
 * 
 * Estructura Aplicación WEB
 *
 */
class usuarios{

    public $userID = 0;
    /**
     * Crea una nueva fila en la tabla usuarios.
     */
    function create($username,$pass,$nombre,$apellido,$edad,$curso,$f_registro){
        
       
        
        $connect = new Tools();
        $conexion = $connect->connectDB();
        $sql = "INSERT INTO usuarios (username,pass,nombre,apellido,edad,curso,f_registro) 
        VALUES ('".$username."','".$pass."','".$nombre."','".$apellido."','".$edad."','".$curso."','".$f_registro."');";
        $consulta = mysqli_query($conexion,$sql);
        if($consulta){
        }else{
               echo "No se ha podido insertar en la base de datos<br><br>".mysqli_error($conexion);
        }
        $connect->disconnectDB($conexion);
        return $consulta;
    }
    /**
     * Modifica los datos 
     */
    function update($username,$pass,$nombre,$apellido,$edad,$curso){
        
        $connect = new Tools();
        $conexion = $connect->connectDB();
        $sql = "UPDATE usuarios SET "
                . "username = '$username', "
                . "pass = '$pass', "
                . "nombre = '$nombre', "
                . "apellido = '$apellido', "
                . "edad = '$edad', "
                . "curso = '$curso',  
        WHERE userID = $this->userID ;";
        $consulta = mysqli_query($conexion,$sql);
        if(!$consulta){
               echo "No se ha podido modificar la base de datos<br><br>".mysqli_error($conexion);
        }
        $connect->disconnectDB($conexion);
        return $consulta;
        
    }
    /**
     * Borra el elemento a partir de un ID dado
     */ 
    function delete($userID){
        $connect = new Tools();
        $conexion = $connect->connectDB();
        $sql = "DELETE FROM usuarios WHERE userID=$userID;";
        $consulta = mysqli_query($conexion,$sql);
        if($consulta){
        }else{
               echo "No se ha podido borrar la tabla usuarios<br><br>".mysqli_error($conexion);
        }
        $connect->disconnectDB($conexion);
        return $consulta;
    }
    /**
     * Devuelve un array con la información de una fila a partir de un ID
     */
    
    function getData(){
        //Creamos la consulta
        $sql = "SELECT * FROM usuarios WHERE userID = $this->userID;";
        //obtenemos el array
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }
    
    /**
     * Devuelve el nombre de usuario identificando por ID
     */
    function getCampo1(){
        //Creamos la consulta
        $sql = "SELECT username FROM usuarios WHERE userID = $this->userID;";
        //obtenemos el array
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array[0][0];
    }
    
    /**
     * Devuelve Toda la información de la tabla usuarios
     */
    function getAllInfo(){
        //Creamos la consulta
        $sql = "SELECT * FROM usuarios";
        //obtenemos el array
        $tool = new Tools();
        $array = $tool->getArraySQL($sql);
        return $array;
    }
}