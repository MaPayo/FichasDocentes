<header class="row justify-content-center align-items-center" id="cabecera">

    <div class="col-md-2 col-6" id="logo">
        <a >     
            <?php
            echo '<img class="img-fluid" src="' . RUTA_IMGS . 'ucmtext.png">';
            ?> </a>
        </div>

        <div class="col-md-8 col-9">
            <h1 class="web_title">Gestión de Fichas Docentes</h1>
        </div>
        <div class="col-md-2 col-3" id="logout">
            <?php

            if(isset($_SESSION['idSesion'])){
                //aqui iria el echo de abajo
            }
            echo'<div class="btn-group">
            <button type="button" class="btn btn-outline-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="' . RUTA_IMGS . 'profile.png" width="40">
            </button>
            <div class="dropdown-menu dropdown-menu-right">
            <button class="dropdown-item" type="button">Configuración</button>
            <button class="dropdown-item" type="button">Permisos</button>
            <div class="dropdown-divider"></div>
            <button class="dropdown-item" type="button">Cerrar Sesión</button>
            </div>
            </div>';

            
            ?>
        </div>

        

    </header>