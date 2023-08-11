<?php
include("../../layout/menu.php");
include("../../layout/header.php");
include("../../database/conexion.php");

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

$sq="SELECT id_estado,nombre FROM estado WHERE id_estado=$xd";
$a=mysqli_query($cone,$sq);
if($a){
    if($fila=mysqli_fetch_array($a)){
        $id_est=$fila["id_estado"];
        $nom=$fila["nombre"];
    }
}


?>

<body> 
<a href="Estados.php"><button button class="btn btn-eliminar"><i class="bi bi-arrow-return-left"></i> Regresar</button></a>
    <section class="d-flex justify-content-center">
        <div class="card col-sm-6 p-3">
            <div class="mb-3">
                <h1>Editar de estado</h1>
            </div>
            <div class="mb-2">
                
                <form method="post" >
                    <div class="mb-2">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introdusca su nombre" required value="<?php echo $nom; ?>">
                    </div>
                    </div>
                     <center><button type="submit" class="btn btn-primary" name="registrar" id="registrar">Actualizar</button></center>

                </form>

            </div>
        </div>
        
    </section>
    
  
</body>
<?php

     if (isset($_POST['registrar'])) {

    $nombre = mysqli_real_escape_string($cone, $_POST['nombre']);

    $comporbarestado= mysqli_num_rows(mysqli_query($cone, "SELECT nombre FROM estado WHERE nombre = '$nombre'"));

    if($comporbarestado>=1){ ?>
    <br>
               <div class="alert alert-danger alert-dismissible">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Hay un estado existente
               </div>

    <?php }else{  ?> <?php
    
            $registro = "UPDATE estado SET nombre='$nombre' WHERE id_estado='$id_est'";
            $r = mysqli_query($cone, $registro);
        if($r){ ?>
        <br>
            <div class="alert alert-success alert-dismissible">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                           Felicidades Se edito el estado exitosamente
            </div>

               <?php
                 ?>
                 <meta http-equiv="refresh" content="2;Estados.php">

                 <?php
        }
    }
}
  ?>  

<?php 
include("../../layout/footer.php");
?>
