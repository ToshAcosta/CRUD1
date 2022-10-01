<?php 
if(!isset($_GET['codigo'])){
    header('location: index.php?mensaje=error!');
    exit();
}

include 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentecia = $bd -> prepare("DELETE from almacen where codigo = ?;");
$resultado = $sentecia -> execute([$codigo]);

if ($resultado == TRUE) {
    header('location: index.php?mensaje=eliminado');
}
else {
    header('location: index.php?mensaje=error!');
}

?>

