<?php
include("../../database/conexion.php");
include("../../layout/menu.php");
include("../../layout/header.php");

$xd=$_GET['id'];

$sq="SELECT Id_resultado, total FROM resultados  WHERE Id_resultado=$xd";
$a=mysqli_query($cone,$sq);
if($a){
    if($fila=mysqli_fetch_array($a)){
        $id=$fila["Id_resultado"];
        $pun=$fila["total"];
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
<a href="Resultados.php"><button button class="btn btn-eliminar"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
    <section class="d-flex justify-content-center">
        <div class="card col-sm-6 p-3">
            <div class="mb-3">
                <h1>Editar resultado</h1>
            </div>
            <div class="mb-2">
                
                <form method="post" >
                    <div class="mb-2">
                        <label for="nombre">Puntaje :</label>
                        <input type="text" class="form-control" name="come" id="come" placeholder="Escriba la evaluciacion" required value="<?php echo $pun; ?>">
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
   

        $registro = "UPDATE resultados SET total='$puntaje' WHERE Id_resultado='$id'";
        $r = mysqli_query($cone, $registro);

            if ($r) { ?> 
                    <br>
                   <div class="alert alert-success alert-dismissible">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                               Se actualizo exitosamente
                    </div>
                
                    <meta http-equiv="refresh" content="2;Resultados.php">
                 <?php
                } 
}

?>

</div>
<?php
include("../../layout/footer.php");
?>