<?php

include_once 'functions.php';
/**
 * Clase que contiene funciones útiles sobre la funcionalidad del programa 
 * 
 * @package  Estructura Aplicación WEB
 *
 */
class Tools {
    
    /**
     * Devuelve una instancia de la conexión a la base de datos
     * @return type
     */
    function connectDB(){

        
        
        $conexion = mysqli_connect(SERVER, USER, PASS, DB);
        // $conexion = new PDO(SERVER, USER, PASS, DB);
        if($conexion){
        }else{
               echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>';
        }
        mysqli_query ($conexion,"SET NAMES 'utf8'");
        mysqli_set_charset($conexion, "utf8");
        return $conexion;
        // GLOBAL $conexion;
    }

    /**
     * Desconecta la base de datos a partir de la instancia que le pasamos
     * @param type $conexion
     * @return type
     */
    function disconnectDB($conexion){
       $close = mysqli_close($conexion);
                if($close){
                }else{
                    echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>';
                }   
        return $close;
    }
    /**
     * Obtenemos un array multidimensional a partir de una sentencia SQL de entrada
     * @param type $sql
     * @return type
     */
    function getArraySQL($sql){
        //Creamos la conexiÃ³n
        $conexion = $this->connectDB();
        //generamos la consulta
        if(!$result = mysqli_query($conexion, $sql)) die(mysqli_error($conexion));
        $rawdata = array();
        //guardamos en un array multidimensional todos los datos de la consulta
        $i=0;
        while($row = mysqli_fetch_array($result))
        {
            $rawdata[$i] = $row;
            $i++;
        }
        $this->disconnectDB($conexion);
        return $rawdata;
    }
    
    /**
     * Dibujamos en pantalla una tabla a partir de un array multidimensional de entrada
     * @param type $rawdata
     */
    function displayTable($rawdata){

        //DIBUJAMOS LA TABLA
        echo '<table class="table table-striped table-bordered table-condensed">';
        $columnas = count($rawdata[0])/2;
        //echo $columnas;
        $filas = count($rawdata);
        //echo "<br>".$filas."<br>";
        //Añadimos los titulos
            
        for($i=1;$i<count($rawdata[0]);$i=$i+2){
            next($rawdata[0]);
            echo "<th><b>".key($rawdata[0])."</b></th>";
            next($rawdata[0]);
        }
        for($i=0;$i<$filas;$i++){
            echo "<tr>";
            for($j=0;$j<$columnas;$j++){
                echo "<td>".$rawdata[$i][$j]."</td>";
                
            }
            echo "</tr>";
        }       
        echo '</table>';
    }
    
    function displayError($title,$message){
            ?>
            <div class="row">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-4">
                    <div class="page-header">
                        <h1><?php echo $title; ?></h1>
                    </div>
                    <div class="alert alert-info">
                        <?php echo $message; ?>
                    </div>
                </div>
                <div class="col-sm-4">

                </div>
            </div>
            <?php
            
    }

        function registro(){

        $c = new Tools;
        $c -> connectDB(); 

        $link = "INSERT INTO users (username, password, nombre, apellido, edad, curso) VALUES (:username, :password, :nombre, :apellido; :edad, :curso)";
        $stmt=mysqli_stmt_init($link);
        if (!empty($_POST['username']) && !empty($_POST['password'])) {

        } elseif (mysqli_stmt_prepare( $stmt,$link))
            {

            mysqli_stmt_bind_param($stmt,':username', $_POST['username']);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            mysqli_stmt_bind_param(':password', $password);
            mysqli_stmt_bind_param($stmt,':nombre', $_POST['nombre']);
            mysqli_stmt_bind_param($stmt,':apellido', $_POST['apellido']);
            mysqli_stmt_bind_param($stmt,':edad', $_POST['edad']);
            mysqli_stmt_bind_param($stmt,':curso', $_POST['curso']);
            
            } elseif (mysqli_stmt_execute($stmt)) {
                echo 'hola b';
            // $message = 'Successfully created new user';
            } else {
                echo 'hola m';
            // $message = 'Sorry there must have been an issue creating your account';
            }
        }
}
?>