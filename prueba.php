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
      $sql = "SELECT id_registro,nombre_clinica,registros.nombre as name,correo,direccion,horario,telefono,latitud,longitud,categorias.nombre as categoria,titulo,descripcion,imagen
      FROM registros JOIN categorias ON especialidad=id_categoria
      WHERE especialidad=$esp";
      $stmt=$conexion->query($sql);
      $rows = $stmt->fetchAll();
      foreach ($rows as $value) {}
      include ("bar.php");
  ?>
  <div class="container" style="margin-top:70px">
    <img src="imagenkodaxweb/<?php echo $value['imagen'] ?>" alt="" class="centrado" style="width:150px">
    <h2 style="text-align:center;color:white;"><?php echo $value['titulo'] ?></h2>
    <p style="text-align:center;color:white;"><?php echo $value['descripcion'] ?></p>
    <table class="w3-table-all">
    <thead>
      <tr class="w3-light-grey">
        <th>Clinica</th>
        <th>Medico(a)</th>
        <th>Especialidad</th>
      </tr>
    </thead>
    <?php foreach ($rows as $key): ?>
    <tr onclick="location.href ='medicos_mas.php?cod=<?php echo $key["id_registro"] ?>'">
      <td><?php echo $key["nombre_clinica"] ?></td>
      <td><?php echo $key["name"] ?></td>
      <td><?php echo $key["categoria"] ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
  </div>
</body>
</html>
