<?php
   include('../../database/conexion.php');

   $id_estado=$_POST["id_estado"];

   $queryM="SELECT ID_municipio,Nombre FROM municipio WHERE IdEstado='$id_estado' ORDER BY Nombre ASC";
   $municipio=mysqli_query($cone,$queryM);

   $html= "<option value='0' selected disabled>Selecciona un Municipio</option>";

   while($rowM=$municipio->fetch_assoc()){
    $html= "<option value='".$rowM['ID_municipio']."'> ".$rowM['Nombre']."</option>";
   }
   echo $html;


?>