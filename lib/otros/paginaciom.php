<?php
//Antony Fortin
    include ("lib/conexion.php");
    $esp = $_GET["esp"];
    $sql2 = "SELECT id_registro,nombre_clinica,registros.nombre as name,correo,foto,direccion,horario,telefono,latitud,longitud,categorias.nombre as categoria,
    titulo,descripcion,imagen
    FROM registros JOIN categorias ON especialidad=id_categoria
    WHERE especialidad=$esp";
    $sql3 = "SELECT * FROM categorias WHERE id_categoria=$esp";
    $stmt2=$conexion->query($sql2);
    $rows2 = $stmt2->fetchAll();
    $stmt3=$conexion->query($sql3);
    $rows3 = $stmt3->fetchAll();
    $filas = $stmt2->rowCount();
    foreach ($rows2 as $value) {}
    foreach ($rows3 as $value2) {}
    include ("bar.php");
    $tamano_paginas=4;
    if(isset($_GET["pagina"])){
    if($_GET["pagina"]==1){
        $pagina=1;
    }else{
        $pagina=$_GET["pagina"];
        if($pagina <= 0){
        $pagina = 1;
        }
    }
    }else{
    $pagina=1;
    }
    $total_paginas=ceil($filas/$tamano_paginas);
    if($pagina > $total_paginas){
    $pagina = $total_paginas;
    }
    if($pagina < 1){
    $pagina = 1;
    }
    $empezar_desde=($pagina-1)*$tamano_paginas;
    $sql = "SELECT id_registro,nombre_clinica,registros.nombre as name,correo,foto,direccion,horario,telefono,latitud,longitud,categorias.nombre as categoria,titulo,descripcion,imagen
    FROM registros JOIN categorias ON especialidad=id_categoria
    WHERE especialidad=$esp LIMIT $empezar_desde,$tamano_paginas";
    $stmt=$conexion->query($sql);
    $rows = $stmt->fetchAll();
    $_SESSION['medicos'] = $filas;
