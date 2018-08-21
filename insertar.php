
<?php
//Delmy Ossiris Cruz
    include('lib/conexion.php');
    if(!isset($_POST['nombreClinica'])){
        header("Location: index.php");
    }
    $nombCli=$_POST['nombreClinica'];
    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];
    $password= password_hash($_POST['password'], PASSWORD_BCRYPT);
    $esp=$_POST['especialidad'];
    $direccion=$_POST['direccion'];
    $horario=$_POST['horario'];
    $telefono=$_POST['telefono'];
    $lati=$_POST['latitud'];
    $longi=$_POST['longitud'];

    $nombr = $_FILES['imagen']['name'];
    $nombrer = strtolower($nombr);
    $cd=$_FILES['imagen']['tmp_name'];
    $ruta = "imagenkodaxweb/" . $_FILES['imagen']['name'];
    $destino = "imagenkodaxweb/".$nombrer;
    $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);

    if($nombr==""){
        $nombr="default.jpg";
    }

    $insert="insert into registros(nombre_clinica,nombre,correo,contrasena,especialidad,direccion,horario,telefono,latitud,longitud,foto,destino) values(?,?,?,?,?,?,?,?,?,?,?,?)";
    $result=$conexion->prepare($insert);
    $result->execute(array($nombCli,$nombre,$correo,$password,$esp,$direccion,$horario,$telefono,$lati,$longi,$nombr,$destino));
    header('Location: login.php');
