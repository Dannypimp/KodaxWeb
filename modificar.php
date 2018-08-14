<?php
//Katling Jolibeth Jimenez

    include('lib/conexion.php');
    session_start();
    $var=$_SESSION['user'];
    $nombCli=$_POST['nombreClinica'];
    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];
    $password=$_POST['password'];
    $esp=$_POST['especialidad'];
    $direccion=$_POST['direccion'];
    $horario=$_POST['horario'];
    $telefono=$_POST['telefono'];
    //$lati=$_POST['lati'];
    //$longi=$_POST['longi'];
    $sql="update registros set nombre_clinica=?, nombre=?,correo=?,contrasena=?,especialidad=?,direccion=?,horario=?,telefono=? WHERE id_registro=?";
    $result=$conexion->prepare($sql);
    $result->execute(array($nombCli,$nombre,$correo,$password,$esp,$direccion,$horario,$telefono,$var));
    header('Location: perfil.php');
