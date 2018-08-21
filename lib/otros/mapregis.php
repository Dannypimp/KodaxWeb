<script>
//katling
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
            map: map
          });

          bounds.extend(markers[i].getPosition());
          map.fitBounds(bounds);
        }

        markers = new google.maps.Marker({
          position: location,
          map: map
        });
      }

   </script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKDUTz8Uq47j1NLhJIvd0DRfD4hREetCA&amp;libraries=places" async="" defer=""></script>
