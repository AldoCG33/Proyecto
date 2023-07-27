<?php
include("database/conexion.php");

$dina="SELECT id_estado,nombre FROM estado ORDER BY nombre ASC";
$estado=mysqli_query($cone,$dina);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="resource/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/07bf2ec53c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--se agrega el jquery para el dinamismo en etsados y municipios-->
    <script languaje="javaescript" src="resourse/js/jquery-3.7.0.min.js"> </script>

    <!--se agrega la funcionanlidad al estado y municipio-->
    <script languaje="javascript">
        $(document).ready(function(){
            $("#estado").change(function(){
                $("#estado option: selected") .each (function(){
                    id_estado =$(this).val;
                    $.post("resource/Jquery/getMunucipio.php",{id_estado:id_estado
                    }, function(data){
                        $("#id_estado").html(data);
                    });
                });      
            })
        });
    </script>



</head>

<body>
    <section class="d-flex justify-content-center">
        <div class="card col-sm-6 p-3">
            <div class="mb-3">
                <h1>Alta de usuarios</h1>
            </div>
            <div class="mb-2">
                <form method="post">
                    <div class="mb-2">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introdusca su nombre" required>
                    </div>
                    <div class="mb-2">
                        <label for="Usuario">Usuario:</label>
                        <input type="text" class="form-control" name="Usuario" id="Usuario" placeholder="Introdusca su Usuario"required>
                    </div>
                    <div class="mb-2">
                        <label for="">Tipo de usuario</label>
                        <select class="form-select" name="Tusuario" id="Tusuario" required >
                                 <option value="" selected disabled>Selecciona una opción</option>
                                 <option value="1">Maestro</option>
                                 <option value="2">Alumno</option>
                        </select>

                        <!--aqui va la primera consulta dinamica con Sql-->
                    </div>
                    <div class="row">
                        <div class="col">
                         <div class="mb-3">
                             <label for="estado" class="form-label">Estado:</label>
                             <select class="form-select" name="estado" id="estados" required>
                                <option value="0" selected disabled>Selecciona un estado</option>
                                <?php while($row =$estado->fetch_assoc()){ ?>
                                    <option value="<?php echo $row['id_estado']?>"> <?php echo $row['nombre'];?></option>
                                <?php }  ?>
                             </select>
                         </div>
                         </div>
                         <div class="col">
                        <div class="mb-3">
                             <label for="municipio" class="form-label">Municipio:</label>
                             <select type="text" class="form-control" id="municipio" name="municipio" >

                             </select>
                        </div>
                        </div>
                    </div>
                    <div class="mb-3">
                          <label for="correo" class="form-label">Correo electrónico:</label>
                          <input type="email" class="form-control" id="correo" name="correo" placeholder="Introduzca su correo" required>
                    </div>
                    <div class="mb-3">
                          <label for="contraseña" class="form-label">Contraseña:</label>
                          <input type="password" class="form-control" id="contraseña" name="contraseña"placeholder="Introduzca la contraseña" required >
                     </div>
                     
                     <div class="mb-3">
                          <label for="contraseña" class="form-label">Repita contraseña:</label>
                          <input type="password" class="form-control" id="contraseña" name="Rcontraseña" placeholder="Introduzca la contraseña" required >
                     </div>
                     <center><button type="submit" class="btn btn-primary" name="registrar">Registrarse</button></center>

                </form>

            </div>
        </div>
    </section>
    
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</body>
<?php



$nombre=($_POST['nombre']);
$usuario=($_POST['Usuario']);
$tipoU=($_POST['Tusuario']);
$correo=($_POST['correo']);
$contra=($_POST['contraseña']);


$prueba1="INSERT INTO usuario (nombre,usuario,contraseña,correo,id_tipo_usu,id_estado,Avatar) values ('$nombre','$usuario','$contra','$correo','$tipoU','2','fvgrET')";
mysqli_query($cone,$prueba1);

mysqli_close($cone);

?>



</html>