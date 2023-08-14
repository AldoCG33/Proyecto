<?php
include("../../database/conexion.php");
include("../../layout/menu.php");
include("../../layout/header.php");

$dina="SELECT id_usuario,usuario FROM usuario ORDER BY usuario ASC";
$estado=mysqli_query($cone,$dina);

$dina1="SELECT ID,puntaje FROM evaluacion ORDER BY puntaje ASC";
$resul=mysqli_query($cone,$dina1);

?>
<?php
$xd=$_GET['id'];
$sq="SELECT idPreguntas,Id_usuario,Preguntas,id_evaluacion FROM Preguntas WHERE idPreguntas=$xd";
$a=mysqli_query($cone,$sq);
if($a){
    if($fila=mysqli_fetch_array($a)){
        $id=$fila["idPreguntas"];
        $usu=$fila["Id_usuario"];
        $preguntas=$fila["Preguntas"];
        $evalua=$fila["id_evaluacion"];
    }
}
?>

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
<a href="preguntas.php"><button button class="btn btn-eliminar"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
    <section class="d-flex justify-content-center">
        <div class="card col-sm-6 p-3">
            <div class="mb-3">
                <h1>Editar Preguntas</h1>
            </div>
            <div class="mb-2">
                
                <form method="post" >
                    <div class="mb-2">
                        <label for="nombre">Escriba la pregunta:</label>
                        <input type="text" class="form-control" name="come" id="come" placeholder="Escriba el comenario" value="<?php echo $preguntas;?>" require>
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
                        <div class="col">
                         <div class="mb-3">
                             <label for="estado" class="form-label">Calificacion:</label>
                             <select class="form-select" name="cbx_cali" id="cbx_cali" required>
                                <option value="0" selected disabled>Selecione la calificacion:</option>
                                <?php while($row =$resul->fetch_assoc()){ ?>
                                    <option value="<?php echo $row['ID']?>"> <?php echo $row['puntaje'];?></option>
                                <?php }  ?>
                             </select>
                         </div>
                        </div>
                     <center><button type="submit" class="btn btn-primary" name="registrar" id="registrar">Agregar</button></center>

                </form>

            </div>
        </div>
        
    </section>
    

<?php
if (isset($_POST['registrar'])) {

    $pregunta= mysqli_real_escape_string($cone, $_POST['come']);
    $usuario = mysqli_real_escape_string($cone, $_POST['cbx_usu']);
    $resu = mysqli_real_escape_string($cone, $_POST['cbx_cali']);

        $registro = "UPDATE preguntas SET Preguntas='$pregunta', Id_usuario='$usuario' , id_evaluacion='$resu' WHERE idPreguntas='$id'";
        $r = mysqli_query($cone, $registro);

            if ($r) { ?> 
                    <br>
                   <div class="alert alert-success alert-dismissible">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Se actualizo el comentario exitosamente 
                    </div>
                
                    <meta http-equiv="refresh" content="2; preguntas.php">
                 <?php
                } 
}

?>

</div>
<?php
include("../../layout/footer.php");
?>