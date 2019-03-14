<?php
   /* echo 
    $usuario = $_POST['nnombre'];
    $pass = $_POST['npassword'];
    $user = "admin@admin";
    $pasw = "admin";
        */
$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];
 
if(empty($usuario) || empty($pass)){
header("Location: index.html");
exit();
}
 
mysql_connect('localhost','root','root') or die("Error al conectar " . mysql_error());
mysql_select_db('mensajero') or die ("Error al seleccionar la Base de datos: " . mysql_error());
 
$result = mysql_query("SELECT * from clientes where correo='" . $usuario . "'");
 
if($row = mysql_fetch_array($result)){
    if($row['password'] == $pass){
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("Location: contenido.php");
    }else{
        header("Location: index.html");
        exit();
        }
}else{
    header("Location: index.html");
    exit();
}
 
?>