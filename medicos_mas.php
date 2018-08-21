<?php ob_start(); ?>
<!DOCTYPE html>
//Daniel Figueroa
<html>
<head>
  <title>Principal |KODAX.Clinical|</title>
  <?php include('lib/links.php'); ?>
  <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 568px;  /* The height is 400 pixels */
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
  <div class="w3-container w3-content w3-padding-64" style="max-width:2000px" id="">
    <div class="w3-card-4 w3-col m6">
      <div class="w3-container w3-blue">
        <h2>Información</h2>
      </div>
      <div class="w3-container w3-white">
        <label style="margin-top:10px">Nombre de la Clínica</label>
        <h4><i class="fa fa-hospital"></i> <?php echo $key["nombre_clinica"] ?></h4>
        <label style="margin-top:10px">Nombre del Médico(a)</label>
        <h4><i class="fa fa-user"></i> <?php echo $key["name"] ?></h4>
        <label style="margin-top:10px">Correo Electrónico</label>
        <h4><i class="fa fa-at"></i> <?php echo $key["correo"] ?></h4>
        <label style="margin-top:10px">Dirección</label>
        <h4><i class="fa fa-directions"></i> <?php echo $key["direccion"] ?></h4>
        <label style="margin-top:10px">Horario</label>
        <h4><i class="fa fa-clock"></i> <?php echo $key["horario"] ?></h4>
        <label style="margin-top:10px">Teléfono</label>
        <h4><i class="fa fa-phone"></i> <?php echo $key["telefono"] ?></h4>
        <label style="margin-top:10px"> Especialidad</label>
        <h4><i class="fa fa-certificate"></i><?php echo $key["categoria"] ?></h4>
        <div id="mapRegistro"></div>
      </div>
    </div>
    <div class="w3-card-4 w3-col m6" >
      <div class="w3-container w3-blue">
        <h2>Ubicación</h2>
      </div>
      <div class="w3-row w3-padding-32" id="map" >
      </div>
    </div>
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
