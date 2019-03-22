<?php
/*
*Jugador
*/
/**
 *
 */
class Jugador
{
  private $conexion=null;
  private $codigo;
  private $nombre;
  private $peso;

    public function __construct()
    {
      
    }
    /*Para entrada array $_POST*/
    /*Para salida string con el $error
    "" -> No hay error
    msg -> Error encontrado*/

    public function comprobarCampos($post)
    {
        $error = null;
        if (!isset($_POST) || !isset($_POST["Codigo"]) || !isset($_POST["Nombre"]) || !isset($_POST["Peso"])) {
            $error="No has enviado nada";
        } elseif ($_POST["Codigo"]=="") {
            $error="No has introducido el codigo";
        } elseif ($_POST["Nombre"]=="") {
            $error="No has introducido el Nombre";
        } elseif ($_POST["Peso"]=="") {
            $error="No has introducido el Peso";
        }else{
          $error = false;

        }
        return $error;
    }

    public function conexion(){
      $this->conexion = new mysqli("localhost", "root", "", "nba");
      if ($this->conexion->connect_errno) {
          echo "Fallo al conectar a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error;
      }
    }

    public function insertarJugador(){
      $consulta="INSERT INTO jugadores (codigo, Nombre, Procedencia, Altura, Peso, Posicion, Nombre_equipo)
                  VALUES ($this->codigo, '$this->nombre', NULL, NULL, $this->peso, NULL, NULL)";
      $this->conexion->query($consulta);
    }
  }
?>
