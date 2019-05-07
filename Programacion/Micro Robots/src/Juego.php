<?php
  class Juego extends Conexion {
    private $id;
    private $nombre;

    function __construct(){
      parent::config("localhost","juego","root","");
    }
    function setId_juego($id){
      $this->id=$id;
    }
    function getId_juego(){
      return $this->id;
    }

    function setNombre($nombre){
      $this->nombre=$nombre;
    }
    function getNombre(){
      return $this->nombre;
    }

  }
 ?>
