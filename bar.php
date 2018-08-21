<!--//Keydi Xiomara Vasquez-->
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
<div id="id02" class="w3-modal" >
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">
      <header class="w3-container w3-indigo">
        <span onclick="document.getElementById('id02').style.display='none'"
        class="w3-button w3-display-topright">&times;</span>
        <h2 class="w3-center"><i class="fa fa-warning"></i> Advertencia</h2>
      </header>
      <div class="w3-container w3-light-blue">
        <h4 class="w3-center">¿Seguro que quiere cerrar sesión?</h4>
      </div>
      <footer class="w3-container w3-indigo">
        <input class="w3-button w3-left w3-hover-red" style="width:50%;" onclick="cerrar()" value="si"/>
        <input class="w3-button w3-right" style="width:50%;" onclick="document.getElementById('id02').style.display='none'" value="No"/>
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
