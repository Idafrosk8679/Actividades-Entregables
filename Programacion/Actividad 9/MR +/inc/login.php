<?php         
        require_once 'functions.php';


        $l = new Tools();
        $l -> connectDB();




        $username=$_POST['txtUsername'];
        $password=$_POST['txtPassword'];
        $errorMessage='Mal';
        $num_rows=0; 

        $sql="SELECT * FROM usuarios WHERE 'username=$username'  || 'password=$password'";
        var_dump($sql);
        $result=mysqli_query($l, $sql) or die (mysqli_error($errorMessage));
        var_dump($result);
        $num_rows=mysqli_num_rows($result) or die ($sql.mysqli_error($errorMessage)."");

            if($result)
            {

        session_start();
        $_SESSION[login]=1;
        header("Location:juego.php");

        }else{

        $_SESSION[login]=0;
        header("Location:login.php");
        }

?>