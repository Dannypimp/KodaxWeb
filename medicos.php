<?php ob_start(); ?>
<!DOCTYPE html>
//Keydi Xiomara Vasquez
<html>
<head>
  <title>Principal |KODAX.Clinical|</title>
  <?php include('lib/links.php'); ?>
</head>
<body>
  <?php include ("lib/otros/paginaciom.php"); ?>
  <div class="w3-main w3-content w3-padding"  id="div1index" style="margin-top:70px">
    <div class="w3-row-padding w3-padding-16 w3-center" >
      <!--<img src="imagenkodaxweb/<?php echo $value2['imagen'] ?>" alt="" class="centrado" style="width:150px">-->
      <?php if($_SESSION["medicos"]==0){  ?>
        <div class="w3-container">
          <h1><i class="fa fa-warning"></i> No hay medicos registrados en este momento</h1>
        </div>
      <?php }else{ ?>
      <h2 style="text-align:center;color:white;"><?php echo $value2['nombres'] ?></h2>
      <?php } ?>
      <?php $num=1; foreach ($rows as $key): ?>
      <div class="w3-quarter">
        <div class="w3-card-4 test" id="div4index">
          <img src="imagenkodaxweb/<?php echo $key['foto'] ?>" id="imgmedicos" onclick="location.href ='medicos_mas.php?cod=<?php echo $key["id_registro"] ?>'"/>
          <div class="w3-container">
            <h4 id="titulo2"><?php echo $key["nombre_clinica"] ?></h4>
            <p id="descripcion2"><?php echo $key["name"] ?></p>
          </div>
        </div>
      </div>
      <?php if($num==4||$num==8||$num==12){ ?>
    </div>
  <?php }if($num==4||$num==8||$num==12){ ?>
    <div class="w3-row-padding w3-padding-16 w3-center">
  <?php }$num++; endforeach; ?>
  </div>
  <?php include("lib/otros/paginasm.php") ?>
</body>
</html>
