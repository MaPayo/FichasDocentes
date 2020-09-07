<header class="row justify-content-center align-items-center" id="cabecera">

    <div class="col-md-2 col-6" id="logo">
        <a>
            <?php
            echo '<img class="img-fluid" src="' . RUTA_IMGS . 'ucmtext.png" alt="Logotipo UCM" />';
            ?>
        </a>
    </div>

    <div class="col-md-8 col-9">
        <a href="index.php"><h1 class="web_title">Gestión de Fichas Docentes - Administración</h1></a>
    </div>
    <div class="col-md-2 col-3" id="logout">
        <div class="btn-group">
            <?php
            echo '<button type="button" class="btn btn-outline-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="img-fluid" src="' . RUTA_IMGS . 'profile.png" width="40" alt="Inicio sesion" />
                </button>
                <div class="dropdown-menu dropdown-menu-right">';

            if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                echo '<a class="dropdown-item" href="gestionUsuarios.php">Gestión Usuarios</a>';
                echo '<a class="dropdown-item" href="gestionAsignaturas.php">Gestión Asignaturas</a>';
                echo '<a class="dropdown-item" href="gestionGrados.php">Gestión Grados</a>';
                echo '<div class="dropdown-divider"></div>';
                echo '<a class="dropdown-item" href="logout.php">Cerrar Sesión</a>';
            } else {
                echo ' <a class="dropdown-item" href="index.php">Log In</a>';
            }
            ?>
        </div>
    </div>
</header>