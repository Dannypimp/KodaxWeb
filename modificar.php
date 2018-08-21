<?php
//Katling Jolibeth Jimenez
    include('lib/conexion.php');
    session_start();
    if(!isset($_POST['nombreClinica'])){
        header("Location: index.php");
      }
    $var=$_SESSION['user'];
    $nombCli=$_POST['nombreClinica'];
    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];
    $password=$_POST['password'];
    $esp=$_POST['especialidad'];
    $direccion=$_POST['direccion'];
    $horario=$_POST['horario'];
    $telefono=$_POST['telefono'];
    $nombr = $_FILES['imagen']['name'];
    $nombrer = strtolower($nombr);
    $cd=$_FILES['imagen']['tmp_name'];
    $ruta = "imagenkodaxweb/" . $_FILES['imagen']['name'];
    $destino = "imagenkodaxweb/".$nombrer;
    $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
    //$lati=$_POST['lati'];
    //$longi=$_POST['longi'];

    if($password != ""){
      if($nombr != ""){
        $pass= password_hash($password, PASSWORD_BCRYPT);
        $sql="update registros set nombre_clinica=?, nombre=?,correo=?,contrasena=?,especialidad=?,direccion=?,horario=?,telefono=?,foto=?,destino=? WHERE id_registro=?";
        $result=$conexion->prepare($sql);
        $result->execute(array($nombCli,$nombre,$correo,$pass,$esp,$direccion,$horario,$telefono,$nombr,$destino,$var));
      }
      else{
        $pass= password_hash($password, PASSWORD_BCRYPT);
        $sql="update registros set nombre_clinica=?, nombre=?,correo=?,contrasena=?,especialidad=?,direccion=?,horario=?,telefono=? WHERE id_registro=?";
        $result=$conexion->prepare($sql);
        $result->execute(array($nombCli,$nombre,$correo,$pass,$esp,$direccion,$horario,$telefono,$var));
      }
    }
    else{
      if($nombr != ""){
        $sql="update registros set nombre_clinica=?, nombre=?,correo=?,especialidad=?,direccion=?,horario=?,telefono=?,foto=?,destino=? WHERE id_registro=?";
        $result=$conexion->prepare($sql);
        $result->execute(array($nombCli,$nombre,$correo,$esp,$direccion,$horario,$telefono,$nombr,$destino,$var));
      }
      else{
        $sql="update registros set nombre_clinica=?, nombre=?,correo=?,especialidad=?,direccion=?,horario=?,telefono=? WHERE id_registro=?";
        $result=$conexion->prepare($sql);
        $result->execute(array($nombCli,$nombre,$correo,$esp,$direccion,$horario,$telefono,$var));
      }
    }
    $_SESSION['clinica'] = $nombCli;
    header('Location: perfil.php');
