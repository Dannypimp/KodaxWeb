<!DOCTYPE html>
//Keydi Xiomara Vasquez

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
    <div class="w3-row-padding w3-padding-16 w3-center" >
      <img src="imagenkodaxweb/<?php echo $value['imagen'] ?>" alt="" class="centrado" style="width:150px">
      <h2 style="text-align:center;color:white;"><?php echo $value['titulo'] ?></h2>
      <p style="text-align:center;color:white;"><?php echo $value['descripcion'] ?>
      <?php $num=1; foreach ($rows as $key): ?>
      <div class="w3-quarter">
        <div class="w3-card-4 test" id="div4index">
          <img src="imagenkodaxweb/<?php echo $key['foto'] ?>" style="width:100%" onclick="location.href ='medicos_mas.php?cod=<?php echo $key["id_registro"] ?>'"/>
          <div class="w3-container">
            <h4><?php echo $key["nombre_clinica"] ?></h4>
            <p><?php echo $key["name"] ?></p>
          </div>
        </div>
      </div>
      <?php if($num==4||$num==8||$num==12){ ?>
    </div>
  <?php }if($num==4||$num==8||$num==12){ ?>
    <div class="w3-row-padding w3-padding-16 w3-center">
  <?php }$num++; endforeach; ?>
  </div>
</body>
</html>
