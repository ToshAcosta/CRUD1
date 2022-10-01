<?php
if(empty($_POST["oculto"]) || empty($_POST["txtnombre"]) || empty($_POST["txtalmacen"]) || empty($_POST["txtdescripcion"])){
header('location: index.php?mensaje=Campos_Vacios');
exit();
}

include_once 'model/conexion.php';
$nombre = $_POST["txtnombre"];
$almacen = $_POST["txtalmacen"]; 
$descripcion = $_POST["txtdescripcion"];

$sentencia = $bd -> prepare( "INSERT INTO almacen (Nombre,Almacen,Descripcion) values (?,?,?);");
print_r ($sentencia);
$resultado = $sentencia -> execute([$nombre,$almacen,$descripcion]);

if($resultado == TRUE){
    header('location: index.php?mensaje=Registrado_Correctamente');
    }
else{
    header('location: index.php?mensaje=error');
exit();
}
