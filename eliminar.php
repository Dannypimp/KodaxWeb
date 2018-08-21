//Katling Jimenez
<?php
    include('lib/conexion.php');
    session_start();
    $var=$_SESSION['user'];
    $sql="delete from registros WHERE id_registro='$var'";
    $result=$conexion->prepare($sql);
    $result->execute(array());
    session_destroy();
    header('Location: index.php');
