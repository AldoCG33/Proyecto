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

   $sq="SELECT ID,descripcion,calificacion FROM comentario WHERE ID='$xd'";
   $a=mysqli_query($cone,$sq);
   if($a){
       if($fila=mysqli_fetch_array($a)){
           $id=$fila['ID'];
           $des=$fila['descripcion'];
           $cali=$fila['calificacion'];
   
       }
   }

?>

   <!-- Begin Page Content -->
<div class="container-fluid">
<a href="comentarios.php"><button button class="btn btn-eliminar"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
<div class="container mt-3">
    <h2> Vistas Comentarios</h2>
<div class="table-responsive">         
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
      <tr>
      <td><h4><center>Comentario:</center></h4></td>
      <td><center><h5><?php echo $des?></h5></center></td>
      </tr>      
      <tr>
      <td><h4><center>Calificacion:</center></h4></td>
      <td><center><h5><?php echo $cali?></h5></center></td>
      </tr>      
        
    </tbody>
  </table>
</div>
</div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
   
<?php
    include("../../layout/footer.php");
?>