<?php ob_start(); ?>
<!DOCTYPE html>
//Delmy Ossiris Cruz
<html>
<head>
  <title>Principal |KODAX.Clinical|</title>
  <?php include ('lib/links.php'); include ('lib/otros/stylemap.php') ?>
</head>
<body>
  <?php include("bar.php"); ?>
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="">
    <div class="w3-card-4">
      <div class="w3-container w3-blue">
        <h2>Registro</h2>
      </div>
      <form class="w3-container w3-white" action="insertar.php" method="post" enctype="multipart/form-data">
        <label style="margin-top:10px">Nombre de la Clínica</label>
        <input class="w3-input" type="text" required name="nombreClinica" title="Sólo debe poseer 30 caracteres maximo" maxlength="30">
        <label style="margin-top:10px">Nombre del Médico(a)</label>
        <input class="w3-input" type="text" required name="nombre" title="Sólo debe poseer letras y 30 caracteres maximo" maxlength="30">
        <label style="margin-top:10px">Correo Electrónico</label><div id="Info"></div>
        <input class="w3-input" type="email" id="mail" required name="correo">
        <label style="margin-top:10px">Contraseña</label>
        <input class="w3-input" type="password" required name="password">
        <label style="margin-top:10px">Dirección</label>
        <input class="w3-input" type="text" required name="direccion">
        <label style="margin-top:10px">Horario</label>
        <input class="w3-input" type="text" required name="horario">
        <label style="margin-top:10px">Teléfono</label>
        <input class="w3-input" type="text" required maxlength="8" name="telefono">
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
  <?php include ("lib/otros/mapregis.php"); ?>
</body>
</html>
