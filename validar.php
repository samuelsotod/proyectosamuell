<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

session_start();
$_SESSION['usuario']=$usuario;
include('db.php');

$conexion=mysqli_connect("localhost","root","","samuel");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:home.php");

}else{
    ?>
    <?php
    include("index.html");

  ?>
  <h1 class="bad">Tuviste un error, intenta de nuevo</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
