<?php
include("../../database/conexion.php");
include("../../layout/menu.php");
include("../../layout/header.php");

$dina="SELECT id_usuario,usuario FROM usuario ORDER BY usuario ASC";
$estado=mysqli_query($cone,$dina);
?>
<html>
     <style>
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
    .btn-eliminar {
      background-color: #f44336;
    }
    a{
      text-decoration: none;
    }
    </style>
<body> 
<a href="comentarios.php"><button button class="btn btn-eliminar"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
    <section class="d-flex justify-content-center">
        <div class="card col-sm-6 p-3">
            <div class="mb-3">
                <h1>Alta de comentarios</h1>
            </div>
            <div class="mb-2">
                
                <form method="post" >
                    <div class="mb-2">
                        <label for="nombre">Escriba el comentario :</label>
                        <input type="text" class="form-control" name="come" id="come" placeholder="Escriba el comenario" required >
                    </div>

                        <!--aqui va la primera consulta dinamica con Sql-->
                    </div>
                    <div class="row">
                        <div class="col">
                         <div class="mb-3">
                             <label for="estado" class="form-label">Usuario:</label>
                             <select class="form-select" name="cbx_usu" id="cbx_usu" required>
                                <option value="0" selected disabled>Seleccione al usuario</option>
                                <?php while($row =$estado->fetch_assoc()){ ?>
                                    <option value="<?php echo $row['id_usuario']?>"> <?php echo $row['usuario'];?></option>
                                <?php }  ?>
                             </select>
                         </div>
                        </div>
                        <div class="mb-2">
                        <label for="nombre">Escriba la calificacion:</label>
                        <input type="number" min="1" max="5" class="form-control" name="cali" id="cali" placeholder="Escriba el comenario" required >
                    </div>
                     <center><button type="submit" class="btn btn-primary" name="registrar" id="registrar">Agregar</button></center>

                </form>

            </div>
        </div>
        
    </section>
    
</body>
<?php
if (isset($_POST['registrar'])) {

    $comentario= mysqli_real_escape_string($cone, $_POST['come']);
    $usuario = mysqli_real_escape_string($cone, $_POST['cbx_usu']);
    $calificacion=mysqli_real_escape_string($cone,$_POST['cali']);

        $registro = "INSERT INTO comentario (ID_usuario, descripcion, calificacion ) VALUES ('$usuario', '$comentario','$calificacion')";
        $r = mysqli_query($cone, $registro);

            if ($r) { ?> 
                    <br>
                   <div class="alert alert-success alert-dismissible">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Se agrego el comentario exitosamente 
                    </div>
                
                    <meta http-equiv="refresh" content="2;comentarios.php">
                 <?php
                } 
}

?>

</div>
<?php
include("../../layout/footer.php");
?>