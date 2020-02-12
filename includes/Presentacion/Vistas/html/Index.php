<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/fichasdocentes.css">
    <!--<script src="./javascript.js" type="text/javascript"></script>-->
    <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <title>Fichas Docentes</title>
</head>

<body>
    <div class="container-fluid">
       <?php
       require("./cabecera.php");
       ?>
        <div id="content" class="row">
           <?php
           require("./fichas.php");
           ?>
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