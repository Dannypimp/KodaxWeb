<!DOCTYPE html>
//Daniel Figuero
<html>
<head>
  <title>Principal |KODAX.Clinical|</title>
  <?php include('lib/links.php'); ?>
  <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
</head>
<body>
  <?php
      include("lib/conexion.php");
      $cod = $_GET["cod"];
      $sql = "SELECT id_registro,nombre_clinica,registros.nombre as name,correo,direccion,horario,telefono,latitud,longitud,categorias.nombre as categoria
      FROM registros JOIN categorias ON especialidad=id_categoria
      WHERE id_registro=$cod";
      $stmt=$conexion->query($sql);
      $rows = $stmt->fetchAll();
      foreach ($rows as $key){}
      include ("bar.php");
  ?>
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px;margin-top:30px" id="">
    <div class="w3-card-4" style="width:100%;">
      <header class="w3-container w3-blue">
        <h1><?php echo $key["nombre_clinica"] ?></h1>
      </header>
      <div class="w3-container" style="background:white">
        <h4><i class="fa fa-user"></i><strong> Médico:</strong> <?php echo $key["name"] ?></h4>
        <h4><i class="fa fa-certificate"></i><strong> Especialidad:</strong> <?php echo $key["categoria"] ?></h4>
        <h4><i class="fa fa-at"></i><strong> Correo:</strong> <?php echo $key["correo"] ?></h4>
        <h4><i class="fa fa-phone"></i><strong> Telefono:</strong> <?php echo $key["telefono"] ?></h4>
        <h4><i class="fa fa-directions"></i><strong> Dirección:</strong> <?php echo $key["direccion"] ?></h4>
        <h4><i class="fa fa-clock"></i><strong> Horario:</strong> <?php echo $key["horario"] ?></h4>
      </div>
    </div>
  </div>
  <div class="w3-container w3-content w3-padding-64" style="max-width:1500px;" id="map">
  </div>
  <script>
      // Initialize and add the map
      function initMap() {
       // The location of Uluru
       var uluru = {lat: <?php echo $key["latitud"] ?>, lng: <?php echo $key["longitud"] ?>};
       // The map, centered at Uluru
       var map = new google.maps.Map(
           document.getElementById('map'), {zoom: 15, center: uluru});
       // The marker, positioned at Uluru
       var marker = new google.maps.Marker({position: uluru, map: map});
      }
   </script>
   <script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKDUTz8Uq47j1NLhJIvd0DRfD4hREetCA&callback=initMap">
   </script>
</body>
</html>
