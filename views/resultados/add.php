<?php
include("../../database/conexion.php");
include("../../layout/menu.php");
include("../../layout/header.php");

$dina="SELECT Id_resultado,total FROM resultados ORDER BY total ASC";
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
<a href="Resultados.php"><button button class="btn btn-eliminar"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
    <section class="d-flex justify-content-center">
        <div class="card col-sm-6 p-3">
            <div class="mb-3">
                <h1>Alta de Resultados</h1>
            </div>
            <div class="mb-2">
                
                <form method="post" >
                    <div class="mb-2">
                        <label for="nombre">Resultado :</label>
                        <input type="number" minlength="0" maxlength="10" class="form-control" name="resu" id="resu" placeholder="Escriba el resultado" required >
                    </div>

                     <center><button type="submit" class="btn btn-primary" name="registrar" id="registrar">Agregar</button></center>

                </form>

            </div>
        </div>
        
    </section>
    
</body>
<?php
if (isset($_POST['registrar'])) {

    $resultado= mysqli_real_escape_string($cone, $_POST['resu']);
   
        $registro = "INSERT INTO resultados (total) VALUES ('$resultado')";
        $r = mysqli_query($cone, $registro);

            if ($r) { ?> 
                    <br>
                   <div class="alert alert-success alert-dismissible">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Se agrego el resultado exitosamente 
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