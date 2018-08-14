<!DOCTYPE html>
<html>
<head>
  <title>Principal |KODAX.Clinical|</title>
  <?php require('lib/links.php'); ?>
</head>
<body>
  <?php
      require ("lib/conexion.php");
      $esp = $_GET["esp"];
      $sql = "SELECT id_registro,nombre_clinica,registros.nombre as name,correo,foto,direccion,horario,telefono,latitud,longitud,categorias.nombre as categoria,titulo,descripcion,imagen
      FROM registros JOIN categorias ON especialidad=id_categoria
      WHERE especialidad=$esp";
      $stmt=$conexion->query($sql);
      $rows = $stmt->fetchAll();
      foreach ($rows as $value) {}
      include ("bar.php");
  ?>
  <div class="w3-main w3-content w3-padding"  id="div1index" style="margin-top:70px">
    <img src="imagenkodaxweb/<?php echo $value['imagen'] ?>" alt="" class="centrado" style="width:150px">
    <h2 style="text-align:center;color:white;"><?php echo $value['titulo'] ?></h2>
    <p style="text-align:center;color:white;"><?php echo $value['descripcion'] ?>
    <ul class="w3-ul w3-card-4">
      <?php $num=1; foreach ($rows as $key): ?>
      <li class="w3-bar" onclick="location.href ='medicos_mas.php?cod=<?php echo $key["id_registro"] ?>'">
        <img src="imagenkodaxweb/<?php echo $key['foto'] ?>"  class="w3-bar-item w3-circle w3-hide-small" style="width:85px">
        <div class="w3-bar-item">
          <span class="w3-large"><?php echo $key["nombre_clinica"] ?></span><br>
          <span><?php echo $key["name"] ?></span>
        </div>
      </li>
      <?php endforeach; ?>
  </div>
</body>
</html>
