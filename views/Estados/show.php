<!-- Incluimos un codigo php  -->
<?php
    include("../../database/conexion.php");
    include("../../layout/menu.php");
    include("../../layout/header.php");
   ?>
   <style>
    .btn-eliminar {
      background-color: #f44336;
    }
    a{
      text-decoration: none;
    }

   </style>
   <?php
   $xd=$_GET['id'];

$sq="SELECT id_estado,nombre FROM estado WHERE id_estado=$xd";
$a=mysqli_query($cone,$sq);
if($a){
    if($fila=mysqli_fetch_array($a)){
        $id=$fila['id_estado'];
        $nom=$fila["nombre"];
    }
}

?>

   <!-- Begin Page Content -->
<div class="container-fluid">
<a href="Estados.php"><button button class="btn btn-eliminar"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
<div class="container mt-3">
    <h2> Vistas estados </h2>        
  <table class="table table-bordered" >
    <thead>
      <tr>
        <th>Datos</th>
        <th>Mis datos</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td><h4><center>ID:</center></h4></td>
      <td><center><h5><?php echo $id?></h5></center></td>
      </tr>
      
      <td><h4><center>Nombre:</center></h4></td>
      <td><center><h5><?php echo $nom?></h5></center></td>
      </tr>
      <tr>
      
        
    </tbody>
  </table>
</div>

      
  
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php
    include("../../layout/footer.php");
?>