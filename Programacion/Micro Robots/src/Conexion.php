<?php
class Conexion {

  public $conexion=null;
  private $servidor="localhost";
  private $bbdd="microrobots";
  private $usuario="root";
  private $password="";


  function __construct(){

  }

  function setServidor($servidor){
    $this->servidor=$servidor;
  }
  function getServidor(){
    return $this->servidor;
  }

  function setBBDD($bbdd){
    $this->bbdd=$bbdd;
  }
  function getBBDD(){
    return $this->bbdd;
  }

  function setUsuario($usuario){
    $this->usuario=$usuario;
  }
  function getUsuario(){
    return $this->usuario;
  }

  function setPassword($password){
    $this->password=$password;
  }
  function getPassword(){
    return $this->password;
  }

  public function config($server,$db,$user,$pass){
    $this->server=$server;
    $this->db=$db;
    $this->user=$user;
    $this->pass=$pass;
  }

  public function conectar(){
    $error=null;
    $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->bbdd);
      if ($this->conexion->connect_errno) {
          $error="Fallo al conectar a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error;
        }
      return $error;
  }
}
 ?>
