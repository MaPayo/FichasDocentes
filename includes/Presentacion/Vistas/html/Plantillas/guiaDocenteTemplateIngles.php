<?php
require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php'); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guía Docente</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <style>
    <?php require(RUTA_CSS . 'guiaDocenteTemplate.css'); ?>
  </style>
</head>

<body>
  <?php
  if ($estado === 'B')
    echo '<h1>BORRADOR</h1>';
  if ($estado === 'V')
    echo '<h1>VERIFICADO</h1>';
  ?>

  <div class="container">

    <!-- Tabla de cabecera -->
    <div>
      <table class="table table-bordered headingTbl">
        <thead>
          <tr class="min-h-100 text-left">
            <th class="w-25"><img src=<?php echo RUTA_IMGS . 'LogoUniversidad.png' ?> alt="escudo ucm" height="100" width="85" /></th>
            <th class="w-50"><?php echo $NombreGrado;  ?></th>
            <th class="w-25"><span class="p-1">Year <?php echo $cursoAcademico;  ?> </span></th>
          </tr>
        </thead>
      </table>
    </div>

    <!-- Tabla de Presentación -->
    <div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <td class="bg-info"><span class="p-1">Subject </span></td>
            <td colspan="4"><?php echo $NombreAsignatura;  ?></td>
            <td class="bg-info"><span class="p-1"> Code: </span> </td>
            <td colspan="2"><?php echo $idAsignatura;  ?></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="bg-info"><span class="p-1">Area: </span></td>
            <td colspan="3"><?php echo $NombreMateria;  ?></td>
            <td class="bg-info"><span class="p-1"> Module: </span> </td>
            <td colspan="3"><?php echo $NombreModulo;  ?></td>
          </tr>

          <tr>
            <td class="bg-info"><span class="p-1">Character: </span></td>
            <td colspan="3"><?php echo $Caracter;  ?></td>
            <td class="bg-info"> <span class="p-1"> Course: </span></td>
            <td><?php echo $Curso;  ?></td>
            <td class="bg-info"> <span class="p-1"> Semester: </span> </td>
            <td><?php echo $Semestre;  ?></td>
          </tr>


          <tr>
            <td class="bg-info"><span class="p-1"> Credits (ECTS) </span></td>
            <td><?php echo $Creditos;  ?></td>
            <td rowspan="3" class="align-middle bg-info">
              <span class="p-1"> Theoretical </span> </td>
            <td><?php echo $CreditosTeorico;  ?></td>
            <td rowspan="3" class="align-middle bg-info">
              <span class="p-1"> Problems </span> </td>
            <td><?php echo $CreditosProblema;  ?></td>
            <td rowspan="3" class="align-middle bg-info">
              <span class="p-1"> Laboratory </span> </td>

            <td><?php echo $CreditosLaboratorio;  ?></td>
          </tr>

          <tr>
            <td class="bg-info"><span class="p-1"> Classroom Credits </span></td>
            <td>
              <!-- 2 Blank -->
            </td>
            <!-- 3 Remove -->
            <td><?php echo $PresencialTeorico;  ?></td>
            <!-- 5 No Field Remove -->
            <td><?php echo $PresencialProblema;  ?></td>
            <!-- 7 No Field Remove -->
            <td><?php echo $PresencialLaboratorio;  ?></td>
          </tr>
          <tr>
            <td class="bg-info"><span class="p-1">Total Hours </span></td>
            <td> </td>
            <!-- 3 Remove -->
            <td> <?php echo $HorasTeorico;  ?>
              <!-- 4 Blank -->
            </td>
            <!-- 5 No Field Remove -->
            <td><?php echo $HorasProblema;  ?></td>
            <!-- 7 No Field Remove -->
            <td><?php echo $HorasLaboratorio;  ?> </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- Second Form Box End -->


    <!-- Third Form Box  -->
    <div class="thirdFormBox">

      <table class="table table-bordered page-break">
        <tr>
          <td rowspan="2" class="w-25 bg-info">
            <span class="p-1"> Coordinating <br /> Teacher: </span>
          </td>
          <td colspan="2" class="w-50"><?php echo $Coordinador;  ?></td>
          <td class="bg-info"> <span class="p-1"> Dpto: </span> </td>
          <td><?php echo $Departamento;  ?></td>
        </tr>

        <tr>
          <td class="bg-info"> <span class="p-1"> Office: </span> </td>
          <td><?php echo $Despacho;  ?></td>
          <td class="bg-info"> <span class="p-1"> Email: </span> </td>
          <td><?php echo $Email;  ?></td>
        </tr>

      </table>

    </div>
    <!-- Third Form End -->
 
    <?php if(isset($rowsGrupoClaseProfesorMod)){?>
      <div class="fourFormBox">

        <table class="table">
        <tr>
    <td colspan="4" class="bg-secondary text-center">Subject's Teachers</td>
  </tr>
  <tr>
    <td class="bg-info"> <span class="p-1"> Group </span> </td>
    <td class="bg-info"> <span class="p-1"> Teacher </span> </td>
    <td class="bg-info"> <span class="p-1"> Dpto </span> </td>
    <td class="bg-info"> <span class="p-1"> Email </span> </td>
  </tr>
          <?php
          foreach ($rowsGrupoClaseProfesorMod as $grupo) {
            $controller = new es\ucm\ControllerImplements();
            $context = new es\ucm\Context(LIST_MODGRUPO_CLASE_PROFESOR, $grupo->getIdGrupoClase());
            $grupoClaseProfesor = $controller->action($context);
        
        
            if ($grupoClaseProfesor->getEvent() === LIST_MODGRUPO_CLASE_PROFESOR_OK)
              foreach ($grupoClaseProfesor->getData() as $profesores) {
                echo '<tr>
        <td>' . $grupo->getLetra() . '</td>';
                $context = new es\ucm\Context(FIND_PROFESOR, $profesores->getEmailProfesor());
                $contextProfesor = $controller->action($context);
                if ($contextProfesor->getEvent() == FIND_PROFESOR_OK) {
                  echo '<td>' . $contextProfesor->getData()->getNombre() . '</td>
        <td>' . $contextProfesor->getData()->getDepartamento() . '</td>
        <td>' . $profesores->getEmailProfesor() . '</td>';
                }
                echo '</tr>';
              }
          }
          ?>
        </table>
      </div>
      <!-- Four Form Box End -->


      <!-- Five No Form Box  Start -->

      <div>

        <table class="table">
        <tr>
    <td colspan="5" class="bg-secondary text-center">Clasess' Schedule</td>
  </tr>
  <tr>
    <td rowspan="2" class="bg-info"> <span class="p-1"> Group </span> </td>
    <td colspan="4" class="bg-info"> <span class="p-1"> Clasess' Schedule </span> </td>
  </tr>

  <tr>
    <td class="bg-info"> <span class="p-1"> Languaje </span> </td>
    <td class="bg-info"> <span class="p-1"> Day </span> </td>
    <td class="bg-info"> <span class="p-1"> Hours </span> </td>
    <td class="bg-info"> <span class="p-1"> Class </span> </td>
  </tr>

          <?php  foreach ($rowsGrupoClaseProfesorMod as $grupo) {
    $controller = new es\ucm\ControllerImplements();
    $context = new es\ucm\Context(LIST_MODHORARIO_CLASE, $grupo->getIdGrupoClase());
    $horarios = $controller->action($context);
  
    if ($horarios->getEvent() === LIST_MODHORARIO_CLASE_OK) {
        foreach ($horarios->getData() as $g) { ?>
        <tr>
        <td><?php echo $grupo->getLetra() ?></td>
        <td><?php echo $grupo->getIdioma() ?></td>
        <td><?php echo $g->getDia() ?></td>
        <td><?php echo $g->getHoraInicio() . " - " . $g->getHoraFin(); ?></td>
        <td><?php echo $g->getAula(); ?></td>
        </tr>
  <?php }
    }
  } ?>
        </table>

      </div>
    <?php }//fin issetProfes
    elseif($rowsGrupoClaseProfesor!==null){?>
     <div class="fourFormBox">

<table class="table">
  <tr>
    <td colspan="4" class="bg-secondary text-center">Subject's Teachers</td>
  </tr>
  <tr>
    <td class="bg-info"> <span class="p-1"> Group </span> </td>
    <td class="bg-info"> <span class="p-1"> Teacher </span> </td>
    <td class="bg-info"> <span class="p-1"> Dpto </span> </td>
    <td class="bg-info"> <span class="p-1"> Email </span> </td>
  </tr>
  <?php
  foreach ($rowsGrupoClaseProfesor as $grupo) {
    $controller = new es\ucm\ControllerImplements();
    $context = new es\ucm\Context(LIST_GRUPO_CLASE_PROFESOR, $grupo->getIdGrupoClase());
    $grupoClaseProfesor = $controller->action($context);


    if ($grupoClaseProfesor->getEvent() === LIST_GRUPO_CLASE_PROFESOR_OK)
      foreach ($grupoClaseProfesor->getData() as $profesores) {
        echo '<tr>
<td>' . $grupo->getLetra() . '</td>';
        $context = new es\ucm\Context(FIND_PROFESOR, $profesores->getEmailProfesor());
        $contextProfesor = $controller->action($context);
        if ($contextProfesor->getEvent() == FIND_PROFESOR_OK) {
          echo '<td>' . $contextProfesor->getData()->getNombre() . '</td>
<td>' . $contextProfesor->getData()->getDepartamento() . '</td>
<td>' . $profesores->getEmailProfesor() . '</td>';
        }
        echo '</tr>';
      }
  }
  ?>
</table>
</div>
<!-- Four Form Box End -->


<!-- Five No Form Box  Start -->

<div>

<table class="table">
  <tr>
    <td colspan="5" class="bg-secondary text-center">Clasess' Schedule</td>
  </tr>
  <tr>
    <td rowspan="2" class="bg-info"> <span class="p-1"> Group </span> </td>
    <td colspan="4" class="bg-info"> <span class="p-1"> Clasess' Schedule </span> </td>
  </tr>

  <tr>
    <td class="bg-info"> <span class="p-1"> Languaje </span> </td>
    <td class="bg-info"> <span class="p-1"> Day </span> </td>
    <td class="bg-info"> <span class="p-1"> Hours </span> </td>
    <td class="bg-info"> <span class="p-1"> Class </span> </td>
  </tr>

  <?php
  foreach ($rowsGrupoClaseProfesor as $grupo) {
    $controller = new es\ucm\ControllerImplements();
    $context = new es\ucm\Context(LIST_HORARIO_CLASE, $grupo->getIdGrupoClase());
    $horarios = $controller->action($context);
  
    if ($horarios->getEvent() === LIST_HORARIO_CLASE_OK) {
        foreach ($horarios->getData() as $g) { ?>
        <tr>
        <td><?php echo $grupo->getLetra() ?></td>
        <td><?php echo $grupo->getIdioma() ?></td>
        <td><?php echo $g->getDia() ?></td>
        <td><?php echo $g->getHoraInicio() . " - " . $g->getHoraFin(); ?></td>
        <td><?php echo $g->getAula(); ?></td>
        </tr>
  <?php }
    }
  } ?>
  
</table>

</div>
    <?php } ?>
<?php

  if(isset($rowsGrupoLaboratorioProfesorMod)){?>
    <div class="fiveFormBox">

<table class="table">
<tr>
        <td colspan="4" class="bg-secondary text-center">Laboratory's Teachers</td>
      </tr>
      <tr>
        <td class="bg-info"> <span class="p-1"> Group </span> </td>
        <td class="bg-info"> <span class="p-1"> Teacher </span> </td>
        <td class="bg-info"> <span class="p-1"> Dpto </span> </td>
        <td class="bg-info"> <span class="p-1"> Email </span> </td>
      </tr>
  <?php
     foreach ($rowsGrupoLaboratorioProfesorMod as $grupo) {
      $controller = new es\ucm\ControllerImplements();
      $context = new es\ucm\Context(LIST_MODGRUPO_LABORATORIO_PROFESOR, $grupo->getIdGrupoLab());
      $profesores = $controller->action($context);
      
      if ($profesores->getEvent() === LIST_MODGRUPO_LABORATORIO_PROFESOR_OK){
      foreach ($profesores->getData() as $profesor) {
        echo '<tr>
        <td>' . $grupo->getLetra() . '</td>';
        $context = new es\ucm\Context(FIND_PROFESOR, $profesor->getEmailProfesor());
        $contextProfesor = $controller->action($context);
        if ($contextProfesor->getEvent() == FIND_PROFESOR_OK) {
          echo '<td>' . $contextProfesor->getData()->getNombre() . '</td>
        <td>' . $contextProfesor->getData()->getDepartamento() . '</td>
        <td>' . $profesor->getEmailProfesor() . '</td>';
        }
        echo '</tr>';
      }
    }
  }


  ?>
</table>
</div>
<!-- Four Form Box End -->


<!-- Five No Form Box  Start -->

<div>

<table class="table">
<tr>
        <td colspan="5" class="bg-secondary text-center">Laboratory's Schedule</td>
      </tr>
      <tr>
        <td rowspan="2" class="bg-info"> <span class="p-1"> Group </span> </td>
        <td colspan="4" class="bg-info"> <span class="p-1"> Laboratory's schedule </span> </td>
      </tr>

      <tr>
        <td class="bg-info"> <span class="p-1"> Language </span> </td>
        <td class="bg-info"> <span class="p-1"> Day </span> </td>
        <td class="bg-info"> <span class="p-1"> Hours </span> </td>
        <td class="bg-info"> <span class="p-1"> Laboratory </span> </td>
      </tr>

  <?php foreach ($rowsGrupoLaboratorioProfesorMod as $grupo) {
        $controller = new es\ucm\ControllerImplements();
        $context = new es\ucm\Context(LIST_MODHORARIO_LABORATORIO, $grupo->getIdGrupoLab());
        $horarios = $controller->action($context);
      
        if ($horarios->getEvent() === LIST_MODHORARIO_LABORATORIO_OK) {
            foreach ($horarios->getData() as $g) { ?>
            <tr>
            <td><?php echo $grupo->getLetra() ?></td>
            <td><?php echo $grupo->getIdioma() ?></td>
            <td><?php echo $g->getDia() ?></td>
            <td><?php echo $g->getHoraInicio() . " - " . $g->getHoraFin(); ?></td>
            <td><?php echo $g->getLaboratorio(); ?></td>
            </tr>
      <?php }
        } 
        }?>
  </tr>
</table>

</div>
  <?php } //Fin issetMod
  elseif($rowsGrupoLaboratorioProfesor !== null){//Si no existe Mood pero si existe consolidado ?>
    <div class="fiveFormBox">

    <table class="table">
      <tr>
        <td colspan="4" class="bg-secondary text-center">Laboratory's Teachers</td>
      </tr>
      <tr>
        <td class="bg-info"> <span class="p-1"> Group </span> </td>
        <td class="bg-info"> <span class="p-1"> Teacher </span> </td>
        <td class="bg-info"> <span class="p-1"> Dpto </span> </td>
        <td class="bg-info"> <span class="p-1"> Email </span> </td>
      </tr>
      <?php
      foreach ($rowsGrupoLaboratorioProfesor as $grupo) {
        $controller = new es\ucm\ControllerImplements();
        $context = new es\ucm\Context(LIST_GRUPO_LABORATORIO_PROFESOR, $grupo->getIdGrupoLab());
        $profesores = $controller->action($context);
        
        if ($profesores->getEvent() === LIST_GRUPO_LABORATORIO_PROFESOR_OK){
        foreach ($profesores->getData() as $profesor) {
          echo '<tr>
          <td>' . $grupo->getLetra() . '</td>';
          $context = new es\ucm\Context(FIND_PROFESOR, $profesor->getEmailProfesor());
          $contextProfesor = $controller->action($context);
          if ($contextProfesor->getEvent() == FIND_PROFESOR_OK) {
            echo '<td>' . $contextProfesor->getData()->getNombre() . '</td>
          <td>' . $contextProfesor->getData()->getDepartamento() . '</td>
          <td>' . $profesor->getEmailProfesor() . '</td>';
          }
          echo '</tr>';
        }
      }
    } 
      ?>
    </table>
  </div>
  <!-- Four Form Box End -->


  <!-- Five No Form Box  Start -->

  <div>

    <table class="table">
      <tr>
        <td colspan="5" class="bg-secondary text-center">Laboratory's Schedule</td>
      </tr>
      <tr>
        <td rowspan="2" class="bg-info"> <span class="p-1"> Group </span> </td>
        <td colspan="4" class="bg-info"> <span class="p-1"> Laboratory's schedule </span> </td>
      </tr>

      <tr>
        <td class="bg-info"> <span class="p-1"> Language </span> </td>
        <td class="bg-info"> <span class="p-1"> Day </span> </td>
        <td class="bg-info"> <span class="p-1"> Hours </span> </td>
        <td class="bg-info"> <span class="p-1"> Laboratory </span> </td>
      </tr>

      <?php foreach ($rowsGrupoLaboratorioProfesor as $grupo) {
        $controller = new es\ucm\ControllerImplements();
        $context = new es\ucm\Context(LIST_HORARIO_LABORATORIO, $grupo->getIdGrupoLab());
        $horarios = $controller->action($context);
      
        if ($horarios->getEvent() === LIST_HORARIO_LABORATORIO_OK) {
            foreach ($horarios->getData() as $g) { ?>
            <tr>
            <td><?php echo $grupo->getLetra() ?></td>
            <td><?php echo $grupo->getIdioma() ?></td>
            <td><?php echo $g->getDia() ?></td>
            <td><?php echo $g->getHoraInicio() . " - " . $g->getHoraFin(); ?></td>
            <td><?php echo $g->getLaboratorio(); ?></td>
            </tr>
      <?php }
        } 
        }?>
      </tr>
    </table>

  </div>
<?php 
  }?>

    <!-- Last Form Box End -->
    <?php if (!empty($GeneralesHTML) || !empty($EspecificasHTML) || !empty($BasicasYTransversalesHTML) || !empty($ResultadosAprendizajeHTML)) : ?>
      <div class="contenedor">
        <div class="cabeceras">
        Competences and learning outcomes
        </div>
        <div class="contenido">
          <p><?php if ($GeneralesHTML) echo "<p><b><u>Generales</u></b></p>" . $GeneralesHTML;  ?></p>
          <p><?php if ($EspecificasHTML) echo "<p><b><u>Específicas</u></b></p>" . $EspecificasHTML;  ?></p>
          <p><?php if ($BasicasYTransversalesHTML) echo "<p><b><u>Básicas y Transversales</u></b></p>" . $BasicasYTransversalesHTML;  ?></p>
          <p><?php if ($ResultadosAprendizajeHTML) echo "<p><b><u>Resultados de Aprendizaje</u></b></p>" . $ResultadosAprendizajeHTML;  ?></p>
        </div>
      </div>
    <?php endif; ?>

    <?php if (!empty($BreveDescripcionHTML)) { ?>
      <div class="contenedor">
        <div class="cabeceras">
        Brief description of content
        </div>
        <div class="contenido">
          <?php echo $BreveDescripcionHTML;  ?>
        </div>
      </div>
    <?php } ?>

    <?php if (!empty($ConocimientosPreviosHTML)) { ?>
      <div class="contenedor">
        <div class="cabeceras">
        Required background knowledge
              </div>
        <div class="contenido">
          <?php echo $ConocimientosPreviosHTML;  ?>
        </div>
      </div>


    <?php } ?>

    <?php if (!empty($ProgramaTeoricoHTML)) { ?>
      <div class="contenedor">
        <div class="cabeceras">
        Theoric Program
        </div>
        <div class="contenido">
          <?php echo $ProgramaTeoricoHTML;  ?>
        </div>
      </div>

    <?php } ?>

    <?php if (!empty($ProgramaSeminariooHTML)) { ?>
      <div class="contenedor">
        <div class="cabeceras">
        Seminary Program
        </div>
        <div class="contenido">
          <?php echo $ProgramaSeminarioHTML;  ?>
        </div>
      </div>

    <?php } ?>

    <?php if (!empty($ProgramaLaboratorioHTML)) { ?>
      <div class="contenedor">
        <div class="cabeceras">
        Laboratory Program
        </div>
        <div class="contenido">
          <?php echo $ProgramaLaboratorioHTML;  ?>
        </div>
      </div>

    <?php } ?>



    <div class="contenedor" style="page-break-after: avoid;">
      <div class="cabeceras" style="page-break-after: avoid;">
        Bibliography
      </div>
      <div class="contenido" style="page-break-after: avoid;">
        <?php echo $CitasBibliograficasHTML;  ?>
      </div>
    </div>

    <div class="contenedor" style="page-break-after: avoid;">
      <div class="cabeceras" style="page-break-after: avoid;">
        Internet Resources 
      </div>
      <div class="contenido" style="page-break-after: avoid;">
        <?php echo $RecursosInternetHTML;  ?>
      </div>
    </div>


    <div class="contenedor" style="page-break-after: avoid;">
      <div class="cabeceras" style="page-break-after: avoid;">
        Methodology
      </div>
      <div class="contenido" style="page-break-after: avoid;">
        <?php echo $MetodologiaHTML;  ?>
      </div>
    </div>

    <table style="page-break-before: always;">
      <thead>
        <tr>
          <th class="bg-info" colspan="3"><span class="p-1"> Evaluation </span> </th>
        </tr>
      </thead>

      <tbody>
        <tr>
        <td class="bg-info"><span class="p-1">Taking exams  </span></td>
        <td class="bg-info"><span class="p-1">% of total:</span></td>
          <td><?php echo $PesoExamenesHTML;  ?></td>
        </tr>

        <tr>
          <td class="text-left" colspan="3"><?php echo $RealizacionExamenesHTML;  ?></td>
        </tr>


        <?php if (!empty($RealizacionLaboratorioHTML)) { ?>
          <tr>
          <td class="bg-info"><span class="p-1">Laboratory Development </span></td>
          <td class="bg-info"><span class="p-1">% of total: </span></td>
            <td><?php echo $PesoLaboratorioHTML;  ?></td>
          </tr>

          <tr>
            <td class="text-left" colspan="3"><?php echo $RealizacionLaboratorioHTML;  ?></td>
          </tr>

        <?php } ?>

        <?php if (!empty($RealizacionActividadesHTML)) { ?>
          <tr>
                <td class="bg-info"><span class="p-1">Other Activities </span></td>
                <td class="bg-info"><span class="p-1">% of total: </span></td>
            <td><?php echo $PesoActividadesHTML;  ?></td>
          </tr>

          <tr>
            <td class="text-left" colspan="3"><?php echo $RealizacionActividadesHTML;  ?></td>
          </tr>
        <?php } ?>

        <tr>
          <td class="bg-info" colspan="3"><span class="p-1"> Final Score </span></td>
        </tr>

        <tr>
          <td class="text-left" colspan="3"><?php echo $CalificacionFinalHTML;  ?></td>
        </tr>

      </tbody>
    </table>


    <!-- Div End For Container -->
  </div>

</body>

</html>