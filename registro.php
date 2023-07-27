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
    <script languaje="javaescript" src="resource/js/jquery-3.7.0.min.js"> </script>

    <!--se agrega la funcionanlidad al estado y municipio-->
    <script languaje="javaescript">
        $(document).ready(function(){
            $("#cbx_estado").change(function(){
                $("#cbx_estado option:selected").each(function(){
                    id_estado =$(this).val();
                    $.post("resource/Jquery/getMunicipio.php",{id_estado:id_estado},function(data){
                        $("#cbx_municipio").html(data);
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
                <form method="post" >
                    <div class="mb-2">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introdusca su nombre" required ">
                    </div>
                    <div class="mb-2">
                        <label for="Usuario">Usuario:</label>
                        <input type="text" class="form-control" name="Usuario" id="Usuario" placeholder="Introdusca su Usuario"required ">
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
                             <select class="form-select" name="cbx_estado" id="cbx_estado" required>
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
                             <select type="text" class="form-control" id="cbx_municipio" name="cbx_municipio" ></select>
                        </div>
                        </div>
                    </div>
                    <div class="mb-3">
                          <label for="correo" class="form-label">Correo electrónico:</label>
                          <input type="email" class="form-control" id="correo" name="correo" placeholder="Introduzca su correo"  required>
                    </div>
                    <div class="mb-3">
                          <label for="contraseña" class="form-label">Contraseña:</label>
                          <input type="password" class="form-control" id="contraseña" name="contraseña"placeholder="Introduzca la contraseña" required >
                     </div>
                     
                     <div class="mb-3">
                          <label for="Rcontraseña" class="form-label">Repita contraseña:</label>
                          <input type="password" class="form-control" id="Rcontraseña" name="Rcontraseña" placeholder="Introduzca la contraseña" required >
                     </div>
                     <center><button type="submit" class="btn btn-primary" name="registrar" id="registrar">Registrarse</button></center>

                </form>

            </div>
        </div>
        
    </section>
    
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
   <?php

     if (isset($_POST['registrar'])) {

    $nombre = mysqli_real_escape_string($cone, $_POST['nombre']);
    $usuario = mysqli_real_escape_string($cone, $_POST['Usuario']);
    $tipoU = mysqli_real_escape_string($cone, $_POST['Tusuario']);
    $correo = mysqli_real_escape_string($cone, $_POST['correo']);
    $contra = mysqli_real_escape_string($cone, md5($_POST['contraseña']));
    $Rcontra = mysqli_real_escape_string($cone, md5($_POST['Rcontraseña']));
    $municipio = mysqli_real_escape_string($cone, $_POST['cbx_municipio']);

    $comprobarusuario = mysqli_num_rows(mysqli_query($cone, "SELECT usuario FROM usuario WHERE usuario = '$usuario'"));
    $comprobaremail = mysqli_num_rows(mysqli_query($cone, "SELECT correo FROM usuario WHERE correo = '$correo'"));

    if ($comprobarusuario >= 1) { ?>
         <br>
        <div class="alert alert-danger alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                El nombre de usuario está en uso, por favor escoja otro
        </div>
    <?php }else {
        if ($comprobaremail >= 1) { ?>
            <br>
               <div class="alert alert-danger alert-dismissible">
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        El email ya está en uso por favor escoja otro o verifique si tiene una cuenta
               </div>
        <?php }else {
            if ($contra != $Rcontra) { ?>

                <br>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                             Las contraseñas no coinciden
                    </div>

            <?php }else {

                $registro = "INSERT INTO usuario (nombre, usuario, contraseña, correo, id_estado, id_tipo_usu, Avatar) VALUES ('$nombre', '$usuario', '$contra', '$correo', '$municipio', '$tipoU', 'resource/images/Avatars/Default.png')";
                $r = mysqli_query($cone, $registro);

                if ($r) { ?>
                    <br>
                   <div class="alert alert-success alert-dismissible">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Felicidades se ha registrado correctamente
                    </div>

                 <?php

                 header("Refresh: 2 ; url = indexusuarios.php");

                } 
            }
        }
    }
}

?>



</html>

