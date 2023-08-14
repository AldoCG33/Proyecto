<!-- Incluimos un codigo php  -->
<?php
include("../../layout/menu.php");
include("../../layout/header.php");
include("../../database/conexion.php");

?>
<!-- Begin Page Content -->
<script src="resource/js/alertarta.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>

        <a href="add.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="bi bi-person-fill-add"></i>  Añadir  </a>
    </div>
    <style>

    /* Estilos para los botones */
    .btn {
      display: inline-block;
      padding: 6px 12px;
      text-align: center;
      text-decoration: none;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn-editar {
      background-color: #008CBA;
    }

    .btn-vista {
      background-color: #555555;
    }

    .btn-eliminar {
      background-color: #f44336;
    }
    a{
      text-decoration: none;
    }
  </style>
<div class="table-responsive">
  <table  id="myTable" class="display" >
    <thead align="center">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Usuario</th>
        <th>Contraseña</th>
        <th>Correo</th>
        <th>Municipio</th>
        <th>Tipo de usuario</th>
        <th>Imagen</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody align="center">
    <?php
    $sql="SELECT usuario.id_usuario ,usuario.nombre ,usuario.usuario ,usuario.contraseña ,usuario.correo ,municipio.NombreM ,tusuario.Tipousuario ,usuario.Avatar 
          FROM usuario,tusuario,municipio WHERE usuario.id_estado=municipio.ID_municipio AND usuario.id_tipo_usu=tusuario.id_tipo_usu";
    $r=mysqli_query($cone,$sql);
    while($fila=mysqli_fetch_array($r)){

    ?>
      <tr>
        <td ><?=$fila['id_usuario'] ?></td>
        <td ><?=$fila['nombre'] ?></td>
        <td ><?=$fila['usuario'] ?></td>
        <td ><?=$fila['contraseña'] ?></td>
        <td ><?=$fila['correo'] ?></td>
        <td ><?=$fila['NombreM'] ?></td>
        <td ><?=$fila['Tipousuario'] ?></td>
        <td><img src="../../resource/images/<?=$fila['Avatar'];?>" width="50" height="70"></td>
        <td>
          <center>
          <a href="edit.php?id=<?=$fila['id_usuario']?>"><button class="btn btn-editar"> <i class="bi bi-pencil-fill"></i></button></a>
          <a href="show.php?id1=<?=$fila['id_usuario'] ?> " ><button class="btn btn-vista"><i class="bi bi-person-vcard-fill"></i></button></a>
          <a href="delete.php?id2=<?=$fila['id_usuario'] ?>" onclick="return confirmar()"><button class="btn btn-eliminar"><i class="bi bi-trash3-fill"></i></button></a>
          </center>
        </td>
        
      </tr>
      <?php } ?>      
      <!-- Puedes agregar más filas aquí -->
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

