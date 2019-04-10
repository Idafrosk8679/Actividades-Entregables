<?php
/*
*Equipo
*/
class Equipo
{
  private $conexion=null;
  public $nombre;
  private $ciudad;
  private $conferencia;
  private $division;

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
        if (!isset($_POST) || !isset($_POST["Nombre"]) || !isset($_POST["Ciudad"]) || !isset($_POST["Conferencia"]) || !isset($_POST["Division"])) {
            $error="No has enviado nada";
        } elseif ($_POST["Nombre"]=="") {
            $error="No has introducido el Nombre";
        } elseif ($_POST["Ciudad"]=="") {
            $error="No has introducido la Ciudad";
        } elseif ($_POST["Conferencia"]=="") {
            $error="No has introducido la Conferencia";
        } elseif ($_POST["Division"]=="") {
            $error="No has introducido la Division";
        }else{
          $error = false;

        }
        return $error;
    }

    public function conexion(){
      $this->conexion = new mysqli ("localhost", "root", "", "nba");
      if ($this->conexion->connect_errno) {
          echo "Fallo al conectar a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error;
      }
    }

    public function insertarEquipo($nombre,$ciudad,$conferencia,$division){
      $consulta="INSERT INTO equipos (Nombre, Ciudad, Conferencia, Division)
                  VALUES ('$nombre', '$ciudad', '$conferencia', '$division')" ;
      $this->conexion->query($consulta);
      echo $consulta;
    }
  
    public function listarEquipo(){
      $consulta="SELECT * FROM equipos WHERE Nombre:$nombre";
      $resultado=$this->conexion->query($consulta);

      return $resultado;
    }
}
?>