<?php include 'template/header.php' ?>

<?php 
include_once "model/conexion.php";
$sentencia = $bd -> query("select * from almacen");
$almacen = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-md-7">
  
  <?php 
if (isset($_GET['mensaje']) and ($_GET['mensaje']) == 'Campos_Vacios'){
   ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Debes llenar todo el formulario.  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
   <?php 
}
?>

<?php 

if (isset($_GET['mensaje']) and ($_GET['mensaje']) == 'Registrado_Correctamente'){
   ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Registrado!</strong> Datos Agregados.  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
   <?php 
}
?>

<?php 

if (isset($_GET['mensaje']) and ($_GET['mensaje']) == 'error!'){
   ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Vuelve a Intentar <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
   <?php 
}
?>

<?php 

if (isset($_GET['mensaje']) and ($_GET['mensaje']) == 'editado'){
   ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Datos modificados!</strong> Los datos fueron actualizados <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
   <?php 
}
?>

<?php 

if (isset($_GET['mensaje']) and ($_GET['mensaje']) == 'eliminado'){
   ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Datos Elinimados!</strong> Los datos fueron eliminados <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
   <?php 
}
?>





    <div class="card">        
            <div class="card header">
            <h5 class="card-title">Inventario</h5>
            </div>
            <div class="p-4">
            <table class="table align-middle">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">#Almacen</th>
      <th scope="col">Descripcion</th>
      <th scope="col" colspan="2">Opciones</th>
    </tr>
  </thead>
  <tbody>

  <?php 
foreach($almacen as $dato){
  ?>
    <tr>
      <th scope="row"><?php echo $dato->Codigo;?> </th>
      <td><?php echo $dato->Nombre;?></td>
      <td><?php echo $dato->Almacen;?></td>
      <td><?php echo $dato->Descripcion;?></td>
      <td><a  class = "text-success" href="editar.php?codigo=<?php echo $dato->Codigo;?>"><i class="bi bi-pen"></i></a></td>
      <td><a onclick="return confirm ('¿Estas seguro de eliminar el registro?')" class = "text-danger" href="eliminar.php?codigo=<?php echo $dato->Codigo;?>"><i class="bi bi-trash-fill"></i></a></td>
     
   
  </tr>
    <?php 
  }
  ?>
  </tbody>
</table>
            </div>
        </div>
        </div>
        <div class="col-md-4">
    <div class="card">   
    <div class="card header">
    <h5 class="card-title">Ingresa la Informacion</h5>
            </div>
            <form class = "p-4" method="POST" action ="registrar.php">
        <div class="mb-3">
<label class="form-label">Nombre:</label>
<input type="text" class="form-control" name="txtnombre" autofocus required>       
</div>
<div class="mb3">
<label class="form-label">#Almacen:</label>
<input type="number" class="form-control" name="txtalmacen" autofocus required>       
</div>
<div class="mb3">
<label class="form-label">Descripcion:</label>
<input type="text" class="form-control" name="txtdescripcion" autofocus required> 
<br>   
    
</div>
<div class="d-grid">
<input type="hidden" name="oculto" value="1">
<input type="submit" class="btn btn-primary" value="Registrar">
</div>
        </form>
        </div>

<?php include 'template/footer.php' ?>