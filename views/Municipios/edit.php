<?php
include("../../layout/menu.php");
include("../../layout/header.php");
include("../../database/conexion.php");

$dina="SELECT id_estado,nombre FROM estado ORDER BY nombre ASC";
$estado=mysqli_query($cone,$dina);
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



<?php
$xd=$_GET['id'];

$sq="SELECT ID_municipio,NombreM,IdEstado FROM municipio WHERE ID_municipio='$xd'";
$a=mysqli_query($cone,$sq);
if($a){
    if($fila=mysqli_fetch_array($a)){
        $id=$fila['ID_municipio'];
        $nombred=$fila['NombreM'];

    }
}
?>

<body> 
<a href="Municipios.php"><button button class="btn btn-eliminar"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
    <section class="d-flex justify-content-center">
        <div class="card col-sm-6 p-3">
            <div class="mb-3">
                <h1>Actualizar municipio</h1>
            </div>
            <div class="mb-2">
                
                <form method="post" >
                    <div class="mb-2">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombreM" id="nombre" placeholder="Introdusca el nombre del municipio" required value="<?php echo $nombred; ?>">
                    </div>

                        <!--aqui va la primera consulta dinamica con Sql-->
                    </div>
                    <div class="row">
                        <div class="col">
                         <div class="mb-3">
                             <label for="estado" class="form-label">Estado:</label>
                             <select class="form-select" name="cbx_estado" id="cbx_estado" required>
                                <option value="0" selected disabled>Selecciona un estado</option>
                                <?php while($row =$estado->fetch_assoc()){ ?>
                                    <option value="<?php echo $row['id_estado']?>"> <?php echo $row['nombre'];?></option>
                                <?php }  ?>
                             </select>
                         </div>
                        </div>
                     <center><button type="submit" class="btn btn-primary" name="registrar" id="registrar">actualizar</button></center>

                </form>

            </div>
        </div>
        
    </section>
    
    
</body>
<?php
if (isset($_POST['registrar'])) {

    $nombre = mysqli_real_escape_string($cone, $_POST['nombreM']);
    $estado = mysqli_real_escape_string($cone, $_POST['cbx_estado']);

    $comprobarnombre = mysqli_num_rows(mysqli_query($cone, "SELECT NombreM FROM municipio WHERE NombreM = '$nombre'"));
    if($comprobarnombre>=1){ ?>
    <br>
        <div class="alert alert-danger alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                El municipio esta repetido elija otro municipio
        </div>

   <?php 
   }else {
    $registro = "UPDATE municipio SET NombreM='$nombre',IdEstado='$estado' WHERE ID_municipio='$id'";
    
                $r=mysqli_query($cone, $registro);

                if ($r) { ?>
                    <br>
                   <div class="alert alert-success alert-dismissible">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Felicidades se edito el municipio exitosamente 
                    </div>

                 <?php
                 ?>
                 <meta http-equiv="refresh" content="2;Municipios.php">

                 <?php
                 

                 

                } 

   }
}

?>
</div>
<?php
include("../../layout/footer.php");
?>