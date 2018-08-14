<?php
//Antony Fortin
include ("lib/conexion.php");
$search = $_POST["search"];
$consultaBusqueda = $_POST['search'];
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
if (isset($consultaBusqueda)) {
  $consulta = "SELECT id_registro,nombre_clinica,registros.nombre as name,correo,direccion,horario,telefono,latitud,longitud,descripcion,imagen,categorias.nombre as categoria
  FROM registros
  JOIN categorias ON especialidad = id_categoria
  WHERE nombre_clinica LIKE '%$consultaBusqueda%'
  OR categorias.nombre LIKE '%$consultaBusqueda%'";
  $result=$conexion->prepare($consulta);
  $result->execute(array());
  $rows = $result->fetchAll();
  $filas = $result->rowCount();
  foreach ($rows as $key){}
};
include ("bar.php");
?>
