<!-- Incluimos un codigo php  -->
<?php
include("layout/menu.php");
include("layout/header.php");
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">INICIO</h1>

        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="bi bi-person-fill-add"></i>  Añadir  </a>
    </div>
    <style>
    /* Estilos para la tabla */
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    /* Estilos para los botones */
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

    .btn-editar {
      background-color: #008CBA;
    }

    .btn-vista {
      background-color: #f44336;
    }

    .btn-eliminar {
      background-color: #555555;
    }
  </style>
</head>
<body>
  <h1>Tabla de Usuarios</h1>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Usuario</th>
        <th>Correo</th>
        <th>Contraseña</th>
        <th>Tipo de Usuario</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Nombre Ejemplo</td>
        <td>usuario_ejemplo</td>
        <td>ejemplo@correo.com</td>
        <td>********</td>
        <td>Administrador</td>
        <td>
          <button class="btn btn-editar">Editar</button>
          <button class="btn btn-vista">Vista</button>
          <button class="btn btn-eliminar">Eliminar</button>
        </td>
      </tr>
      <!-- Puedes agregar más filas aquí -->
    </tbody>
  </table>

    
  

</div>
<!-- /.container-fluid -->


</div>
<!-- End of Main Content -->
<?php
include("layout/footer.php");
?>
