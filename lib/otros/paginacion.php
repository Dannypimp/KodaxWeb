<?php
  include("lib/conexion.php");
  $sql2 ="SELECT * FROM categorias";
  $stmt2=$conexion->query($sql2);
  $rows2 = $stmt2->fetchAll();
  $filas = $stmt2->rowCount();
  include("bar.php");
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
  $sql="SELECT * FROM categorias LIMIT $empezar_desde,$tamano_paginas";
  $stmt=$conexion->query($sql);
  $rows = $stmt->fetchAll();
