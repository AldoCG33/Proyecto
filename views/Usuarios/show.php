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
   $xd=$_GET['id1'];

$sq="SELECT id_usuario,nombre,usuario,contraseña,correo,id_estado,id_tipo_usu,Avatar FROM usuario WHERE id_usuario=$xd";
$a=mysqli_query($cone,$sq);
if($a){
    if($fila=mysqli_fetch_array($a)){
        $id=$fila['id_usuario'];
        $nom=$fila["nombre"];
        $usu=$fila["usuario"];
        $con=$fila["contraseña"];
        $correo=$fila["correo"];
        $muni=$fila["id_estado"];
        $tipous=$fila["id_tipo_usu"];
        $ava=$fila["Avatar"];

    }
}

?>

   <!-- Begin Page Content -->
<div class="container-fluid">
<a href="indexusuarios.php"><button button class="btn btn-eliminar"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
<div class="container mt-3">
    <h2> Vistas </h2>
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
        <td><h4><center>Avatar:</center></h4></td>
        <td><center><img src="../../resource/images/<?=$ava?>" class="rounded-circle" alt="Cinque Terre" width="100" height="125"></center></td>
      </tr>
      <tr>
      <td><h4><center>Nombre:</center></h4></td>
      <td><center><h5><?php echo $nom?></h5></center></td>
      </tr>
      <tr>
      <td><h4><center>Usuario:</center></h4></td>
      <td><center><h5><?php echo $usu?><center><h5></td>
      </tr>
      <tr>
      <td><h4><center>Correo:</center></h4></td>
      <td><center><h5><?php echo $correo?></h5></center></td>
      </tr>
      <tr>
      <td><h4><center>Contraseña:</center></h4></td>
      <td><center><h5><?php echo $con?></h5></center></td>
      </tr>
      <tr>
      <td><h4><center>Municipio:</center></h4></td>
      <td><center><h5><?php echo $muni ?></h5></center></td>
      </tr>
      <tr>
      <td><h4><center>Tipo de usuario:</center></h4></td>
      <td> <center><h5><?php echo $tipous ?></h5></center></td></center>
      </tr>
      <tr>
        
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