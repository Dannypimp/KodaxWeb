//Keydi Xiomara Vasquez
<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Principal |KODAX.Clinical|</title>
  <?php include('lib/links.php'); ?>
</head>
<body>
  <?php include("lib/otros/paginacion.php"); ?>
  <div class="w3-main w3-content w3-padding"  id="div1index" >
    <h1 id="h1index">Especialidades</h1>
    <div class="w3-row-padding w3-padding-16 w3-center" >
      <?php $num=1; foreach ($rows as $key): ?>
      <div class="w3-quarter">
        <div class="w3-card-4" id="div4index">
          <a href="medicos.php?esp=<?php echo $key["id_categoria"] ?>"><img src="imagenkodaxweb/<?php echo $key['imagen'] ?>" alt="" id="imgindex"></a>
          <div class="w3-container w3-center">
            <h3 id="titulo"><?php echo $key['titulo'] ?></h3>
            <p id="descripcion"><?php echo $key['descripcion']?></p>
          </div>
        </div>
      </div>
      <?php if($num==4||$num==8){ ?>
    </div>
  <?php }if($num==4){ ?>
    <div class="w3-row-padding w3-padding-16 w3-center">
  <?php }$num++; endforeach; ?>
  </div>
  <?php include("lib/otros/paginas.php") ?>
</body>
</html>
