<?php
/*
*Jugador
*/
class Jugador
{
  private $conexion=null;
  private $codigo;
  public $nombre;
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
            $error="No has introducido el Codigo";
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
      $this->conexion = new mysqli ("localhost", "root", "", "nba");
      if ($this->conexion->connect_errno) {
          echo "Fallo al conectar a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error;
      }
    }
    
    

    public function insertarJugador($codigo,$nombre,$peso){
      $consulta="INSERT INTO jugadores (Codigo, Nombre, Procedencia, Altura, Peso, Posicion, Nombre_equipo)
                  VALUES ('$codigo', '$nombre', NULL, NULL, '$peso', NULL, NULL)" ;
      $this->conexion->query($consulta);
      echo $consulta;
    }
  
    public function listarJugador(){
      $consulta="SELECT * FROM jugadores WHERE Codigo:$codigo";
      $resultado=$this->conexion->query($consulta);

      return $resultado;
    }

  public function setCodigo($numero){
    if($numero>0) $this->codigo=numero;
  }

  public function getCodigo(){
    return $this->codigo;
  }
}
?>