<header class="row justify-content-center align-items-center" id="cabecera">

  <div class="col-md-2 col-6" id="logo">
    <a>     
      <?php
      echo '<img class="img-fluid" src="' . RUTA_IMGS . 'ucmtext.png">';
      ?> 
    </a>
  </div>

  <div class="col-md-8 col-9">
   <h1 class="web_title">Gestión de Fichas Docentes</h1> 
 </div>
 <div class="col-md-2 col-3" id="logout">
  <div class="btn-group">
    
    <?php

    echo '<button type="button" class="btn btn-outline-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="' . RUTA_IMGS . 'profile.png" width="40">
    </button>
    <div class="dropdown-menu dropdown-menu-right">';

    if(isset($_SESSION['login']) && $_SESSION['login'] === true){
     echo'
     <a class="dropdown-item" type="button">Configuración</a>
     <a class="dropdown-item" type="button">Permisos</a>
     <div class="dropdown-divider"></div>
     <a class="dropdown-item" href="logout.php">Cerrar Sesión</a>
     ';
   }
   else{
     echo' <a class="dropdown-item" href="index.php"">Log In</a>';
   }
   ?>
 </div>
</div>
</header>