<!-- Cabecera -->
<?php include("./php.php");
$info=ok();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./bootstrap.css">
    <link rel="stylesheet" href="./fichasdocentes.css">
    <!--<script src="./javascript.js" type="text/javascript"></script>-->
    <script src="./jquery-3.4.1.min.js" type="text/javascript"></script>
    <title>Fichas Docentes</title>
</head>

<body>
    <div class="container-fluid">
        <header class="row" id="cabecera">
            <div class="col-sm-4 align-items-sm-end">
                <img src="../resources/logoucm.png" />
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <h1 class="web_title">Fichas Docentes Prueba</h1>
            </div>
            <div class="col-sm-2 align-items-sm-end" id="logout">
                <!--Este apartado se rellenaria con php-->log out de la aplicación</div>
        </header>
        <div id="content" class="row">
            <nav class="nav flex-column col-sm-3" id="fichas">
               <?php 
               for($i =0; $i <10;$i++){
                   echo '<a href="#">'.$info.'</a>';
               }
               ?>

            </nav>
            <br clear="both">
            <section id="contenido" class="col-sm-9">
                <div id="pestannas">
                    <div id="validacion">Validación</div>
                    <div id="configuracion">Configuración</div>
                    <div id="permisos">Permisos</div>
                </div>
                <div id="contenido">
                    <div id="validacion_text">Validación</div>
                    <div id="configuracion_text">Configuración</div>
                    <div id="permisos_text">Permisos</div>
                </div>
            </section>
        </div>
    </div>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        $("#validacion_text").show();
        $("#configuracion_text").hide();
        $("#permisos_text").hide();
        $("#validacion").css({
            "background-color": "#454545",
            "color": "#F1EDED"
        });

        $("#validacion").click(function() {
            alert("Has pulsado la pestaña de validacion");
            $("#validacion_text").show();
            $("#validacion").css({
                "background-color": "#454545",
                "color": "#F1EDED"
            });

            $("#configuracion_text").hide();
            $("#configuracion").css({
                "background-color": "#F1EDED",
                "color": "#454545"
            });

            $("#permisos_text").hide();
            $("#permisos").css({
                "background-color": "#F1EDED",
                "color": "#454545"
            });
        });


        $("#configuracion").click(function() {
            alert("Has pulsado la pestaña de configuracion");
            $("#validacion_text").hide();
            $("#validacion").css({
                "background-color": "#F1EDED",
                "color": "#454545"
            });

            $("#configuracion_text").show();
            $("#configuracion").css({
                "background-color": "#454545",
                "color": "#F1EDED"
            });

            $("#permisos_text").hide();
            $("#permisos").css({
                "background-color": "#F1EDED",
                "color": "#454545"
            });

        });

        $("#permisos").click(function() {
            alert("Has pulsado la pestaña de permisos");
            $("#validacion_text").hide();
            $("#validacion").css({
                "background-color": "#F1EDED",
                "color": "#454545"
            });

            $("#configuracion_text").hide();
            $("#configuracion").css({
                "background-color": "#F1EDED",
                "color": "#454545"
            });

            $("#permisos_text").show();
            $("#permisos").css({
                "background-color": "#454545",
                "color": "#F1EDED"
            });

        });
    })
</script>

</html>