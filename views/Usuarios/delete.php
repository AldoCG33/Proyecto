<html>
<script  src="../../resource/js/jquery-3.7.0.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
include("../../database/conexion.php");

$eli=$_GET['id2']; 
$sentencia = $cone->query("DELETE FROM usuario WHERE id_usuario='$eli'");

?>

<meta http-equiv="refresh" content="0;indexusuarios.php">
</html>


