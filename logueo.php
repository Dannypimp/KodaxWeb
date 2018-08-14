<?php

//Daniel Figueroa
    include('lib/conexion.php');
    $correo=$_POST['correo'];
    $pass=$_POST['password'];

    $sql="SELECT * FROM registros WHERE correo=?";
    $result=$conexion->prepare($sql);
    $result->execute(array($correo));
    $rows = $result->fetchAll();
    foreach ($rows as $key) {}
    $num=$result->rowCount();

    if($num==1){
      if($key["contrasena"]==$pass){
        session_start();
        $_SESSION['user'] = $key["id_registro"];
        $_SESSION['clinica'] = $key["nombre_clinica"];
        header('Location: perfil.php');
      }
      else {
        header('Location: login.php');
      }
    }
    else {
      header('Location: login.php');
    }
