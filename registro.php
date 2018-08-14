<!DOCTYPE html>
//Delmy Ossiris Cruz

<html>
<head>
  <title>Principal |KODAX.Clinical|</title>
  <?php require('lib/links.php'); ?>
  <style>
    /* Set the size of the div element that contains the map */
    #mapRegistro {
      height: 400px;  /* The height is 400 pixels */
      width: 100%;/* The width is the width of the web page */
     }
  </style>
</head>
<body>
  <?php include("bar.php"); ?>
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="">
    <div class="w3-card-4">
      <div class="w3-container w3-blue">
        <h2>Registro</h2>
      </div>
      <form class="w3-container w3-white" action="insertar.php" method="post" enctype="multipart/form-data">
        <label style="margin-top:10px">Nombre de la Cinica</label>
        <input class="w3-input" type="text" required name="nombreClinica">
        <label style="margin-top:10px">Nombre del Médico(a)</label>
        <input class="w3-input" type="text" required name="nombre">
        <label style="margin-top:10px">Correo Electronico</label>
        <input class="w3-input" type="email" required name="correo">
        <label style="margin-top:10px">Contraseña</label>
        <input class="w3-input" type="password" required name="password">
        <label style="margin-top:10px">Dirección</label>
        <input class="w3-input" type="text" required name="direccion">
        <label style="margin-top:10px">Horario</label>
        <input class="w3-input" type="text" required name="horario">
        <label style="margin-top:10px">Telefono</label>
        <input class="w3-input" type="text" required name="telefono">
        <label style="margin-top:10px">Especialidad</label>
        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
          <select name="especialidad">
              <option value="" >Seleccione su especialidad</option>
              <?php include('lib/conexion.php');
              $sql='select * from categorias;';
              $stmt=$conexion->query($sql);
              $rows = $stmt->fetchAll();
              foreach ($rows as $esp) {
                echo '<option value="'.$esp['0'].'">'.$esp['nombre'].'</option>';}?>
          </select>
        </div>
        <label style="margin-top:10px">Foto de la Clinica</label>
        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
          <input class="w3-file" type="file" name="imagen" maxlength="150">
        </div>
        <div id="mapRegistro"></div>
        <input id="latitude" type="hidden" name="latitud" autocomplete="off" >
        <input id="longitude" type="hidden" name="longitud" autocomplete="off">
        <button class="w3-button w3-blue w3-section w3-right" type="submit">Registrar</button>
      </form>
    </div>
  </div>
  <script>

      ubicacion();
      var markers = [];

      function ubicacion() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else {
          x.innerHTML = "La geolocalización no es compatible con este navegador.";
        }
      }

      function showPosition(position) {

        var lat = position.coords.latitude;
        var lon = position.coords.longitude;
        var mapa = document.getElementById("mapRegistro");
        if (mapa == undefined)
          return;
        var mapProp = {
          center: new google.maps.LatLng(lat, lon),
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.HYBRID,
          mapTypeControl: true,
          mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
          }
        };

        var map = new google.maps.Map(mapa, mapProp);

        google.maps.event.addListener(map, 'click', function(event) {

          placeMarker(map, event.latLng);
          var latitud = event.latLng.lat();
          var longitud = event.latLng.lng();

          document.getElementById("latitude").value = latitud;
          document.getElementById("longitude").value = longitud;

        });

      }

      function placeMarker(map, location) {

        for (var i = 0; i < markers.length; i++) {
          //var latLng = new google.maps.LatLng(markers[i].lat, markers[i].lng);
          markers[i] = new google.maps.Marker({
            position: location,
            map: map,
            animation: google.maps.Animation.BOUNCE
          });

          bounds.extend(markers[i].getPosition());
          map.fitBounds(bounds);
        }


        markers = new google.maps.Marker({
          position: location,
          map: map,
          animation: google.maps.Animation.BOUNCE
        });
      }

   </script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKDUTz8Uq47j1NLhJIvd0DRfD4hREetCA&amp;libraries=places" async="" defer=""></script>
   <!--<script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKDUTz8Uq47j1NLhJIvd0DRfD4hREetCA&callback=initMap">
 </script>-->
</body>
</html>
