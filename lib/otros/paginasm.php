<div class="w3-center w3-padding-32">
    <div class="w3-bar">
    <?php
      if(!isset($filas)){
        header("Location: medicos.php?esp=$esp");
      }
      $paginate_max = 4;
      if($filas != 0){
        $nextpage = $pagina + 1;
        $prevpage = $pagina - 1;
        $spmin = ($pagina > $paginate_max) ? ($pagina - $paginate_max) : 1;
        $spmax = ($pagina < ($total_paginas - $paginate_max)) ? ($pagina + $paginate_max) : $total_paginas;
        if($pagina == 1){
    ?>
          <a class="w3-bar-item w3-white w3-button">1</a>
          <?php
          for($i=$spmin; $i<=$spmax; $i++){
            if($i != 1){
              if($i < 8){
          ?>
          <a class="w3-bar-item w3-button w3-hover-white" href="?esp=<?php echo $esp ?>&pagina=<?php echo $i ?>"><?php echo $i ?></a>
          <?php
              }
            }
          }
            if($total_paginas > $pagina){
          ?>
          <a class="w3-bar-item w3-button w3-hover-white" href="?esp=<?php echo $esp ?>&pagina=<?php echo $nextpage ?>">&raquo;</a>
          <a class="w3-bar-item w3-button w3-hover-white" href="?esp=<?php echo $esp ?>&pagina=<?php echo $total_paginas ?>">&raquo;&raquo;</a>
          <?php
          }
        }
        else{
          ?>
          <a class="w3-bar-item w3-button w3-hover-white" href="?esp=<?php echo $esp ?>&pagina=1" >&laquo;&laquo;</a>
          <a class="w3-bar-item w3-button w3-hover-white" href="?esp=<?php echo $esp ?>&pagina=<?php echo $prevpage ?>" >&laquo;</a>
          <?php
          for($i=$spmin; $i<=$spmax; $i++){
            if($pagina == $i){
          ?>
          <a class="w3-bar-item w3-white w3-button"><?php echo $i ?></a>
          <?php
            }
            else{
          ?>
          <a class="w3-bar-item w3-button w3-hover-white" href="?esp=<?php echo $esp ?>&pagina=<?php echo $i ?>" ><?php echo $i ?></a>
          <?php
            }
          }
          if($total_paginas > $pagina){
          ?>
          <a class="w3-bar-item w3-button w3-hover-white" href="?esp=<?php echo $esp ?>&pagina=<?php echo $nextpage ?>" >&raquo;</a>
          <a class="w3-bar-item w3-button w3-hover-white" href="?esp=<?php echo $esp ?>&pagina=<?php echo $total_paginas ?>" >&raquo;&raquo;</a>
          <?php
          }
        }
          ?>
    </div>
    <?php
      }
    ?>
</div>