<link rel="stylesheet" href="css/w3.css">
<style>

.ver {display:block}

</style>
<?php
//Daniel Figueroa
    include('lib/conexion.php');
    $correo=$_POST['correo'];
    $pass=$_POST['password'];
    if(isset($correo) and isset($pass)){
      $sql="SELECT * FROM registros WHERE correo=?";
      $result=$conexion->prepare($sql);
      $result->execute(array($correo));
      $rows = $result->fetchAll();
      foreach ($rows as $key) {}
      $num=$result->rowCount();

      if($num==1){
        if(password_verify($pass, $key["contrasena"])){
          session_start();
          $_SESSION['user'] = $key["id_registro"];
          $_SESSION['clinica'] = $key["nombre_clinica"];
          header('Location: perfil.php');
        }
        else {
            ?>

             <div id="id04" class="w3-modal ver">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">
                  <header class="w3-container w3-indigo">
                    <span onclick="document.getElementById('id01').style.display='none'"
                    class="w3-button w3-display-topright">&times;</span>
                    <h2 class="w3-center"><i class="fa fa-warning"></i> Advertencia</h2>
                  </header>
                  <div class="w3-container w3-light-blue">
                    <h4 class="w3-center">Correo o contraseña incorrecta</h4>
                  </div>
                  <footer class="w3-container w3-indigo">
                    <input class="w3-button w3-center w3-hover-green" onclick="location.href='login.php'" value="Aceptar"/>
                  </footer>
                </div>
              </div>
          <?php


          //header('Location: login.php');
        }
      }
      else {
          echo '<script>
                var opcion = confirm("Correo o contraseña incorrecta");
                if (opcion == true) {
                  location.href="login.php";
                } else {
                  location.href="login.php";
                }
              </script>';
        //header('Location: login.php');
      }
    }
