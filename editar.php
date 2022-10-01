<?php include 'template/header.php' ?>

<?php 
if(!isset($_GET['codigo'])){
header('location:index.php?mensaje=error!');
exit();
}
include_once 'model/conexion.php';
$codigo = $_GET['codigo'];
$sentencia = $bd -> prepare( "select * from almacen where Codigo = ?;");
$resultado = $sentencia -> execute([$codigo]);
$almacen = $sentencia -> fetch(PDO::FETCH_OBJ);

?>
<div class="container mt-5">
<div class="class row justify-content-center">
    <div class="col-md-4">


<div class="card">   
    <div class="card header">
      Editar Datos
            </div>
            <form class = "p-4" method="POST" action ="editarProceso.php">
        <div class="mb-3">
<label class="form-label">Nombre:</label>
<input type="text" class="form-control" name="txtnombre" required value="<?php echo $almacen -> Nombre; ?>">       
</div>
<div class="mb3">
<label class="form-label">Almacen:</label>
<input type="number" class="form-control" name="txtalmacen" required value="<?php echo $almacen -> Almacen;?>">       
</div>
<div class="mb3">
<label class="form-label">Descripcion:</label>
<input type="text" class="form-control" name="txtdescripcion" required value="<?php echo $almacen -> Descripcion;?>">       
</div>
<br>   

<div class="d-grid">
    <input type="hidden" name="codigo" value="<?php echo $almacen -> Codigo;?>">
<input type="submit" class="btn btn-primary" value="Editar">
</div>

        </form>
      
   
        <?php include 'template/footer.php' ?>
