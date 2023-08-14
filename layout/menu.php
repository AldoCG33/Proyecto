<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel administrativo</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->

    <link href="../../resource/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/07bf2ec53c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- esto es para la paginacion -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />

    <script languaje="javascript" src="../../resource/js/jquery-3.7.0.min.js"> </script>
   <script src="../../resource/js/alertarta.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
       } );
       
    </script>
    
  <script languaje="javascript">
        $(document).ready(function(){
            $("#cbx_estado").change(function(){
                $("#cbx_estado option:selected").each(function(){
                    id_estado =$(this).val();
                    $.post("../../resource/Jquery/getMunicipio.php",{id_estado:id_estado},function(data){
                        $("#cbx_municipio").html(data);
                    });
                });      
            })
        });
    </script>




</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Panel del administrador<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Heading -->
            <div class="sidebar-heading">
                Inicio
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../../index.php">
                <i class="fa-sharp fa-solid fa-house"></i>
                    <span>Inicio</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Usuarios 
            </div>
             <!-- Divider -->
             <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../Usuarios/indexusuarios.php">
                <i class="bi bi-people"></i>
                    <span>Usuarios</span></a>
            </li>

            
            <!-- Heading -->
            <div class="sidebar-heading">
                Entidades
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../Estados/Estados.php">
                <i class="bi bi-globe-americas"></i>
                    <span>Estados</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Municipios/Municipios.php">
                <i class="bi bi-geo-fill"></i>
                    <span>Municipios</span></a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                Evaluaciones
            </div>

            
            <li class="nav-item">
                <a class="nav-link" href="../Comentarios/comentarios.php">
                <i class="bi bi-journal-text"></i>
                    <span>Comentarios</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../Preguntas/preguntas.php">
                <i class="bi bi-question-lg"></i>
                    <span>Preguntas</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../resultados/Resultados.php">
                <i class="bi bi-check2-square"></i>
                    <span>Resultados</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../evaluacion/Evaluacion.php">
                <i class="bi bi-bar-chart-fill"></i>
                    <span>Evaluacion</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            
        </ul>
        <!-- End of Sidebar -->