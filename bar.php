<?php session_start(); ?>

<!--//Keydi Xiomara Vasquez-->

<!-- Navbar -->
<div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-top" id="div1bar">
  <?php if(isset($_SESSION['user'])){ ?>
  <a href="perfil.php" class="w3-bar-item w3-button w3-padding-large"><?php echo $_SESSION['clinica'] ?></a>
  <a href="cerrarSession.php" class="w3-bar-item w3-button w3-padding-large"><i class="fa fa-power-off"></i></a>
  <?php }else{ ?>
  <a href="registro.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Registrarse</a>
  <a href="login.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Iniciar Sesión</a>
  <?php } ?>
</div>
<div class="w3-top">
  <div class="w3-bar w3-white w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large">KodaxClinical</a>
    <form action="busqueda.php" method="post" name="busq">
      <input id="bar" class="w3-bar-item w3-input" type="search" placeholder="Buscar" aria-label="Search" name="search" required>
      <button id="bar" class="w3-bar-item w3-button" type="submit"><i class="fa fa-search"></i></button>
    </form>
    <?php if(isset($_SESSION['user'])){ ?>
    <a href="perfil.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right"><?php echo $_SESSION['clinica'] ?></a>
    <a onclick="cerrar()" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-power-off"></i></a>
    <?php }else{ ?>
    <a href="login.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">Iniciar Sesión</a>
    <a href="registro.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">Registrarse</a>
    <?php } ?>
  </div>
</div>
<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
  } else {
      x.className = x.className.replace(" w3-show", "");
  }
}
  function cerrar() {
      if (confirm("¿Seguro que quiere cerrar sesión?")) {
          location.href="cerrarSession.php";
      }
  }

  function eliminar() {
      if (confirm("¿Seguro que quiere eliminar su perfil?")) {
          location.href="eliminar.php";
      }
  }
</script>
