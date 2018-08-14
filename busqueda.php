<!DOCTYPE html>
//Antony Fortin
<html>
<head>
  <title>Principal |KODAX.Clinical|</title>
  <?php require('lib/links.php'); ?>
</head>
<body>
  <?php
      include("buscar.php");
  ?>
  <div class="w3-main w3-content w3-padding"  id="div1index" >
    <h1 id="h1index">Resultados</h1>
    <div class="w3-row-padding w3-padding-16 w3-center" >
      <?php $num=1; foreach ($rows as $key): ?>
      <div class="w3-quarter">
        <div class="w3-card-4" id="div4index">
          <a href="medicos_mas.php?cod=<?php echo $key["id_registro"] ?>"><img src="imagenkodaxweb/<?php echo $key['imagen'] ?>" alt="" id="imgindex"></a>
          <div class="w3-container w3-center">
            <h3 id="titulo"><?php echo $key['nombre_clinica'] ?></h3>
            <p>Medico(a): <?php echo $key['name'] ?></p>
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
