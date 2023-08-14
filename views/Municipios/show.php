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

   $sq="SELECT ID_municipio,NombreM,IdEstado FROM municipio,estado WHERE ID_municipio='$xd' and municipio.IdEstado=estado.id_estado";
   $a=mysqli_query($cone,$sq);
   if($a){
       if($fila=mysqli_fetch_array($a)){
           $id=$fila['ID_municipio'];
           $nombred=$fila['NombreM'];
          
   
       }
   }

?>

   <!-- Begin Page Content -->
<div class="container-fluid">
<a href="Municipios.php"><button button class="btn btn-eliminar"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
  <div class="container mt-3">
    <h2> Vistas Municipios</h2>  
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
            <td><h4><center>Municipio:</center></h4></td>
            <td><center><h5><?php echo $nombred?></h5></center></td>
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