<!DOCTYPE html>
//Katling Jolibeth Jimenez
<html>
<head>
  <title>Principal |KODAX.Clinical|</title>
  <?php include('lib/links.php'); ?>
  <style>
       /* Set the size of the div element that contains the map */
      #mapPerfil {
        height: 450px;  /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
       }
    </style>
</head>
<body>
  <?php
      include ("lib/conexion.php");
      include ("bar.php");
      $var= $_SESSION['user'];
      $sql = "SELECT id_registro,nombre_clinica,registros.nombre as name,correo,direccion,horario,telefono,latitud,longitud,contrasena,especialidad,categorias.nombre as categoria
      FROM registros JOIN categorias ON especialidad=id_categoria
      WHERE id_registro='$var'";
      $stmt=$conexion->query($sql);
      $rows = $stmt->fetchAll();
      foreach ($rows as $key){}
  ?>
  <div class="w3-container w3-content w3-padding-64" style="max-width:2000px" id="">
    <h2 class="w3-wide w3-center">Perfil</h2>
    <div class="w3-row w3-padding-32 w3-col m4">
      <div class="w3-card-4 w3-container w3-large w3-margin-bottom">
        <form method="post"  action="modificar.php">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px;padding-top:10px;">
            <input class="w3-input w3-border" type="text" placeholder="Nombre de la Clinica" value="<?php echo $key["nombre_clinica"] ?>" required name="nombreClinica">
          </div>
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <input class="w3-input w3-border" type="text" placeholder="Nombre del Médico(a)" value="<?php echo $key["name"] ?>" required name="nombre">
          </div>
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <input class="w3-input w3-border" type="email" placeholder="Nombre del Médico(a)" value="<?php echo $key["correo"] ?>" required name="correo">
          </div>
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <input class="w3-input w3-border" type="password" placeholder="Contraseña" value="<?php echo $key["contrasena"] ?>" required name="password">
          </div>
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <input class="w3-input w3-border" type="text" placeholder="Dirección" value="<?php echo $key["direccion"] ?>" required name="direccion">
          </div>
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <input class="w3-input w3-border" type="text" placeholder="Horario" value="<?php echo $key["horario"] ?>" required name="horario">
          </div>
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <input class="w3-input w3-border" type="text" placeholder="Telefono" value="<?php echo $key["telefono"] ?>" required name="telefono">
          </div>
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <select name="especialidad">
                <option value="<?php echo $key["especialidad"] ?>" ><?php echo $key["categoria"] ?></option>
                <?php require('lib/conexion.php');
                $sql='select * from categorias;';
                $stmt=$conexion->query($sql);
                $rows = $stmt->fetchAll();
                foreach ($rows as $esp) {
                  echo '<option value="'.$esp['0'].'">'.$esp['nombre'].'</option>';}?>
            </select>
          </div>
          <button class="w3-button w3-white w3-section w3-right" type="submit">Guardar cambios</button>
        </form>
        <button type="button" onclick="eliminar()" class="w3-button w3-red w3-section">Eliminar Perfil</button>
      </div>
    </div>
    <div class="w3-row w3-padding-32 w3-col m8" >
      <div class="w3-row w3-padding-32" id="mapPerfil" style="margin-left: 10px;">
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
           document.getElementById('mapPerfil'), {zoom: 15, center: uluru});
       // The marker, positioned at Uluru
       var marker = new google.maps.Marker({position: uluru, map: map});
      }

   </script>
   <script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKDUTz8Uq47j1NLhJIvd0DRfD4hREetCA&callback=initMap">
   </script>
</body>
</html>
