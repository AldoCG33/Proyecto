<?php
include("../../database/conexion.php");
include("../../layout/menu.php");
include("../../layout/header.php");

$dina="SELECT Id_resultado,total FROM resultados ORDER BY total ASC";
$estado=mysqli_query($cone,$dina);

$xd=$_GET['id'];

$sq="SELECT ID,Puntaje,Id_resultado FROM evaluacion WHERE ID=$xd";
$a=mysqli_query($cone,$sq);
if($a){
    if($fila=mysqli_fetch_array($a)){
        $id=$fila["ID"];
        $pun=$fila["Puntaje"];
        $resu=$fila["Id_resultado"];
    }
}

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
<a href="Evaluacion.php"><button button class="btn btn-eliminar"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
    <section class="d-flex justify-content-center">
        <div class="card col-sm-6 p-3">
            <div class="mb-3">
                <h1>editar la evaluacion</h1>
            </div>
            <div class="mb-2">
                
                <form method="post" >
                    <div class="mb-2">
                        <label for="nombre">Puntaje :</label>
                        <input type="text" class="form-control" name="come" id="come" placeholder="Escriba la evaluciacion" required value="<?php echo $pun; ?>">
                    </div>

                        <!--aqui va la primera consulta dinamica con Sql-->
                    </div>
                    <div class="row">
                        <div class="col">
                         <div class="mb-3">
                             <label for="estado" class="form-label">Resultado :</label>
                             <select class="form-select" name="cbx_res" id="cbx_res" required>
                                <option value="0" selected disabled>Seleccione el resultado</option>
                                <?php while($row =$estado->fetch_assoc()){ ?>
                                    <option value="<?php echo $row['Id_resultado']?>"> <?php echo $row['total'];?></option>
                                <?php }  ?>
                             </select>
                         </div>
                        </div>
                     <center><button type="submit" class="btn btn-primary" name="registrar" id="registrar">Agregar</button></center>

                </form>

            </div>
        </div>
        
    </section>
    
</body>
<?php
if (isset($_POST['registrar'])) {

    $puntaje = mysqli_real_escape_string($cone, $_POST['come']);
    $resultado = mysqli_real_escape_string($cone, $_POST['cbx_res']);
   

        $registro = "UPDATE evaluacion SET Puntaje='$puntaje', Id_resultado='$resultado' WHERE ID='$id'";
        $r = mysqli_query($cone, $registro);

            if ($r) { ?> 
                    <br>
                   <div class="alert alert-success alert-dismissible">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                               Se actualizo exitosamente
                    </div>
                
                    <meta http-equiv="refresh" content="2;Evaluacion.php">
                 <?php
                } 
}

?>

</div>
<?php
include("../../layout/footer.php");
?>