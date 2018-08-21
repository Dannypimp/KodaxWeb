<?php ob_start(); ?>
<!DOCTYPE html>
//Katling Jolibeth Jimenez
<html>
<head>
  <title>Principal |KODAX.Clinical|</title>
  <?php include('lib/links.php'); ?>
  <style>
      #mapPerfil {
        width: 100%;
        height: 765px;
       }
    </style>
</head>
<body>
  <?php
      include ("lib/conexion.php");
      include ("bar.php");
      if(!isset($_SESSION['user'])){
        header("Location: index.php");
      }
      $var= $_SESSION['user'];
      $sql = "SELECT id_registro,nombre_clinica,registros.nombre as name,correo,direccion,horario,telefono,
      latitud,longitud,contrasena,especialidad,categorias.nombre as categoria,foto,destino
      FROM registros JOIN categorias ON especialidad=id_categoria
      WHERE id_registro='$var'";
      $stmt=$conexion->query($sql);
      $rows = $stmt->fetchAll();
      foreach ($rows as $key){}
  ?>
  <div class="w3-container w3-content w3-padding-64" style="max-width:2000px" id="">
    <h2 class="w3-wide w3-center" style="color:white;"><?php echo $key["name"] ?></h2>
    <div class="w3-card-4 w3-col m6">
      <div class="w3-container w3-blue">
        <h2>Información</h2>
      </div>
      <form class="w3-container w3-white" action="modificar.php" method="post" enctype="multipart/form-data">
        <label style="margin-top:10px">Nombre de la Clínica</label>
        <input class="w3-input" type="text" required name="nombreClinica" value="<?php echo $key["nombre_clinica"] ?>">
        <label style="margin-top:10px">Nombre del Médico(a)</label>
        <input class="w3-input" type="text" required name="nombre" value="<?php echo $key["name"] ?>">
        <label style="margin-top:10px">Correo Electrónico</label>
        <input class="w3-input" type="email" required name="correo" value="<?php echo $key["correo"] ?>">
        <label style="margin-top:10px">Nueva Contraseña</label>
        <input class="w3-input" type="password" name="password" value="">
        <label style="margin-top:10px">Dirección</label>
        <input class="w3-input" type="text" required name="direccion" value="<?php echo $key["direccion"] ?>">
        <label style="margin-top:10px">Horario</label>
        <input class="w3-input" type="text" required name="horario" value="<?php echo $key["horario"] ?>">
        <label style="margin-top:10px">Teléfono</label>
        <input class="w3-input" type="text" required name="telefono" value="<?php echo $key["telefono"] ?>">
        <label style="margin-top:10px">Especialidad</label>
        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
          <select name="especialidad">
          <option value="<?php echo $key["especialidad"] ?>" ><?php echo $key["categoria"] ?></option>
              <?php include('lib/conexion.php');
              $sql='select * from categorias;';
              $stmt=$conexion->query($sql);
              $rows = $stmt->fetchAll();
              foreach ($rows as $esp) {
                echo '<option value="'.$esp['0'].'">'.$esp['nombre'].'</option>';}?>
          </select>
        </div>
        <label style="margin-top:10px">Foto de la Clínica</label>
        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
          <input class="w3-file" type="file" name="imagen" maxlength="150" value="<?php echo $key["foto"] ?>">
        </div>
        <div id="mapRegistro"></div>
        <input id="latitude" type="hidden" name="latitud" autocomplete="off" >
        <input id="longitude" type="hidden" name="longitud" autocomplete="off">
        <button type="button" onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-red w3-section">Eliminar Perfil</button>
        <button class="w3-button w3-blue w3-section w3-right" type="submit">Guardar Modifiación</button>
      </form>
    </div>
    <div class="w3-card-4 w3-col m6" >
      <div class="w3-container w3-blue">
        <h2>Ubicación</h2>
      </div>
      <?php if($key["latitud"] != NULL){ ?>
      <div class="w3-row w3-padding-32" id="mapPerfil" >
      </div>
      <?php }else{ ?>
      <div class="w3-row w3-padding-32">
        <h1 class="w3-center">No registro ubicación</h1>
      </div>
      <?php } ?>
    </div>
  </div>
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">
      <header class="w3-container w3-indigo">
        <span onclick="document.getElementById('id01').style.display='none'"
        class="w3-button w3-display-topright">&times;</span>
        <h2 class="w3-center"><i class="fa fa-warning"></i> Advertencia</h2>
      </header>
      <div class="w3-container w3-light-blue">
        <h4 class="w3-center">¿Seguro que quiere eliminar su perfil?</h4>
      </div>
      <footer class="w3-container w3-indigo">
        <input class="w3-button w3-left w3-hover-red" style="width:50%;" onclick="eliminar()" value="Si"/>
        <input class="w3-button w3-right" style="width:50%;" onclick="document.getElementById('id01').style.display='none'" value="No"/>
      </footer>
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
