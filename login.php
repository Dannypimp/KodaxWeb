<!DOCTYPE html>
//Daniel Figueroa
<html>
<head>
  <title>Principal |KODAX.Clinical|</title>
  <?php require('lib/links.php'); ?>
</head>
<body>
  <?php include("bar.php"); ?>
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="">
    <div class="w3-card-4">
      <div class="w3-container w3-blue">
        <h2>Iniciar Sesión</h2>
      </div>
      <form class="w3-container w3-white" action ="logueo.php" method="post">
        <label style="margin-top:10px">Correo Electronico</label>
        <input class="w3-input" type="text" required name="correo">
        <label style="margin-top:10px">Contraseña</label>
        <input class="w3-input" type="password" required name="password">
        <button class="w3-button w3-blue w3-section w3-right" type="submit">Iniciar</button>
      </form>
    </div>
  </div>
</body>
</html>
