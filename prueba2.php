<?php ob_start(); session_start(); ?>
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
      <button id="" class="w3-bar-item w3-button" type="submit"><i class="fa fa-search"></i></button>
    </form>
    <?php if(isset($_SESSION['user'])){ ?>
    <a href="perfil.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right"><?php echo $_SESSION['clinica'] ?></a>
    <a onclick="document.getElementById('id02').style.display='block'" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-power-off"></i></a>
    <?php }else{ ?>
    <a href="login.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">Iniciar Sesión</a>
    <a href="registro.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">Registrarse</a>
    <?php } ?>
  </div>
</div>
<div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-blue"> 
        <span onclick="document.getElementById('id02').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>¿Seguro que quiere cerrar sesión?</h2>
      </header>
      <footer class="w3-container w3-blue">
        <input class="w3-button w3-left w3-hover-red" onclick="cerrar()" value="Si"/>
        <input class="w3-button w3-right" onclick="document.getElementById('id02').style.display='none'" value="No"/>
      </footer>
    </div>
  </div>
<script>
  function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    }
    else {
        x.className = x.className.replace(" w3-show", "");
    }
  }
  function cerrar() {
    location.href="cerrarSession.php";
  }

  function eliminar() {
    location.href="eliminar.php";
  }
</script>




















<?php ob_start(); session_start(); ?>
<div class="topnav" id="myTopnav">
  <a href="index.php" class="" style="color:black;">KodaxClinical</a>
  <?php if(isset($_SESSION['user'])){ ?>
  <a href="perfil.php" class="" style="color:black;"><?php echo $_SESSION['clinica'] ?></a>
  <a onclick="document.getElementById('id02').style.display='block'" class="tt"><i class="fa fa-power-off" style="color:black;"></i></a>
  <?php }else{ ?>
  <a href="login.php" class="" style="color:black;">Iniciar Sesión</a>
  <a href="registro.php" class="" style="color:black;">Registrarse</a>
  <?php } ?>
  <form action="busqueda.php" method="post" name="busq" class="w3-right">
    <input class="input" style="color:black;" type="search" placeholder="Buscar" aria-label="Search" name="search" required>
    <button  class="button" style="color:black;" type="submit"><i class="fa fa-search" style="width:30px"></i></button>
  </form>
  <a href="javascript:void(0);" class="icon" style="color:black;" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-blue"> 
        <span onclick="document.getElementById('id02').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>¿Seguro que quiere cerrar sesión?</h2>
      </header>
      <footer class="w3-container w3-blue">
        <input class="w3-button w3-left w3-hover-red" onclick="cerrar()" value="Si"/>
        <input class="w3-button w3-right" onclick="document.getElementById('id02').style.display='none'" value="No"/>
      </footer>
    </div>
  </div>
<script>
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
  }
  function cerrar() {
    location.href="cerrarSession.php";
  }

  function eliminar() {
    location.href="eliminar.php";
  }
</script>