<?php
if(!isset($_POST['codigo'])){
header('location: index.php?mensaje=error!');
}
include_once 'model/conexion.php';
$codigo = $_POST['codigo'];
$nombre = $_POST['txtnombre'];
$almacen = $_POST['txtalmacen'];
$descripcion = $_POST['txtdescripcion'];

$sentencia = $bd -> prepare ("UPDATE almacen SET Nombre = ?, Almacen = ?, Descripcion = ? where Codigo = ?;");
$resultado = $sentencia -> execute([$nombre, $almacen, $descripcion, $codigo]);

if ($resultado == true) {
   header('location: index.php?mensaje=editado');
    }
    else {
        header('location: index.php?mensaje=error!');
        exit();
    }


?>