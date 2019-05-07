<?php
  /**
   * Jugador
   */
  class Usuario extends Conexion
  {
    private $nombre;
    private $apellidos;
    private $edad;
    private $curso;

    function __construct()
    {


    }

    public function comprobarCampos($post){
      $error=null;
      if (!isset($_POST)||!isset($_POST["nombre"])||!isset($_POST["apellidos"])||!isset($_POST["edad"])||!isset($_POST["curso"])) {
        $error = "";
      }elseif ($_POST["nombre"] == "") {
        $error = "No has introducido ningún nombre.";
      }elseif ($_POST["apellidos"] == "") {
        $error = "No has introducido ningún apellidos.";
      }elseif ($_POST["edad"] == "") {
        $error = "No has introducido edad.";
      }elseif ($_POST["curso"] == "") {
        $error = "No has introducido ningúna dirección de correo.";
      }elseif ($_POST["Usuario"] == "") {
        $error = "Es necesario un nombre de usuario.";
      }else{
        $error=false;
        $this->nombre=$post["nombre"];
        $this->apellidos=$post["apellidos"];
        $this->edad=$post["edad"];
        $this->curso=$post["curso"];
      }
      return $error;
    }

  /*  public function conectar(){
    $this->conexion = new mysqli("localhost", "root", "", "juegos");
    if ($this->conexion->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error;
    }
  }
  */
    public function insertarUsuario($post){
        $consulta="INSERT INTO `usuario` (`nombre`, `apellidos`,`edad`,`curso`)
                    VALUES ('$this->nombre', '$this->apellidos', $this->edad, '$this->curso')";
        $this->conexion->query($consulta);
        echo $consulta;
    }

    public function listarUsuario(){

    $consulta="select * from usuario";
    $resultado=$this->conexion->query($consulta);
    return $resultado;
      }
  }

/*
  private function comprobarPuntuacion($id_usuario){
    $error=false;
    $resultado = $this->conexion->query("select puntuacion
                                        from usuario_juego
                                        where id_usuario =$id_usuario");
    if (mysqli_num_rows($resultado)==0){
      $error=true;
    }
    return $error;
  }

  public function introducirPuntuacion($id_usuario){
    $error=null;
    if($this->comprobarPuntuacion($id_usuario)==false){
    $error="Ya hay una puntuación";
    }
    else{
    $consulta="insert into usuario_juego (id_usuario, id_juego, puntuacion)
                values ($id_usuario, '1', '0')";
    $this->conexion->query($consulta);
    $error=false;
    }
    return $error;
  }


  public function sacarPuntuacion($id_usuario){
    $resultado=$this->conexion->query("select puntuacion
                            from usuario_juego
                            where usuario_juego.id_usuario=$id_usuario");
    foreach ($resultado as $usuario) {
      $this->puntuacion=$usuario['puntuacion'];
      }
    }

  public function incrementarPuntuacion($id_usuario){
    $this->conexion->query("update usuario_juego
                            set usuario_juego.puntuacion=usuario_juego.puntuacion+100
                            where usuario_juego.id_usuario=$id_usuario");
  }

  function setPuntuacion($puntuacion){
    if ($puntuacion<0){
      $this->puntuacion=0;
    }
    else{
      $this->puntuacion=$puntuacion;
    }
  }
  function getPuntuacion(){
    return $this->puntuacion;
  }
}
*/
 ?>
