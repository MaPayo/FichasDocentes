<?php
require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía Docente</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 
    <style>
      <?php require(RUTA_CSS.'guiaDocenteTemplate.css');?>
    </style>
</head>
<body>
<?php 
if($estado === 'B')
echo '<h1<center>Borrador</center></h1>';
if($estado === 'V')
echo '<h1><center>Verificado</center></h1>';
?>

<div class="container">

<!-- Tabla de cabecera -->
<div >
	<table class="table table-bordered headingTbl">
		<thead>
			<tr class="min-h-100 text-left">
				<th class="w-25"><img src=<?php echo RUTA_IMGS.'LogoUniversidad.png'?> alt="escudo ucm" height="100" width="85"/></th>
				<th class="w-50" ><?php echo $NombreGrado;  ?></th>
				<th class="w-25"><span class="p-1">Curso <?php echo $cursoAcademico;  ?> </span></th>
			</tr>
		</thead>
	</table>
</div>

<!-- Tabla de Presentación -->
	<div   >
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td class="bg-info"><span class="p-1" >Ficha de la <br/> Asignatura: </span></td>
                            <td colspan="4"><?php echo $NombreAsignatura;  ?></td>
                            <td class="bg-info"><span class="p-1">   Código: </span> </td>
                            <td colspan="2"><?php echo $idAsignatura;  ?></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bg-info"><span class="p-1">Materia: </span></td>
                            <td colspan="3"><?php echo $NombreMateria;  ?></td>
                            <td class="bg-info"><span class="p-1"> Módulo: </span> </td>
                            <td colspan="3"><?php echo $NombreModulo;  ?></td>
                        </tr>

                        <tr>
                            <td class="bg-info"><span class="p-1">Carácter:  </span></td>
                            <td colspan="3"><?php echo $Caracter;  ?></td>
                            <td class="bg-info"> <span class="p-1"> Curso: </span></td>
                            <td><?php echo $Curso;  ?></td>
                            <td class="bg-info"> <span class="p-1">  Semestre: </span> </td>
                            <td><?php echo $Semestre;  ?></td>
                        </tr>


                        <tr>
                        	<td class="bg-info"><span class="p-1"> Créditos (ECTS)   </span></td>
                        	<td><?php echo $Creditos;  ?></td>
                        	<td rowspan="3" class="align-middle bg-info">
                        		<span class="p-1"> Teóricos </span> </td>
                        	<td><?php echo $CreditosTeorico;  ?></td>
                        	<td rowspan="3" class="align-middle bg-info">
                        		<span class="p-1"> Problemas </span> </td>
                        	<td><?php echo $CreditosProblema;  ?></td>
                        	<td rowspan="3" class="align-middle bg-info">
                        		<span class="p-1"> Laboratorio  </span> </td>

                        	<td><?php echo $CreditosLaboratorio;  ?></td>
                        </tr>

                        <tr>
                        	<td class="bg-info"><span class="p-1"> Presencial   </span></td>
                        	<td> <!-- 2 Blank --> </td>
							<!-- 3 Remove -->
                        	<td><?php echo $PresencialTeorico;  ?></td>
                        	<!-- 5 No Field Remove -->
                        	<td><?php echo $PresencialProblema;  ?></td>
                        	<!-- 7 No Field Remove -->
                        	<td><?php echo $PresencialLaboratorio;  ?></td>
                        </tr>
                        <tr>
                        	<td class="bg-info"><span class="p-1"> Horas Totales   </span></td>
                        	<td>   </td>
                        	<!-- 3 Remove -->
                        	<td> <?php echo $HorasTeorico;  ?> <!-- 4 Blank --></td>
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
<div class="thirdFormBox" >
	
	<table class="table table-bordered page-break">
      <tr>
      	<td rowspan="2" class="w-25 bg-info"> 
      		<span class="p-1"> Profesor(a) <br/> Coordinador(a): </span> 
        </td>
      	<td colspan="2" class="w-50"><?php echo $Coordinador;  ?></td>
      	<td class="bg-info"> <span class="p-1">  Dpto:  </span> </td>
      	<td><?php echo $Departamento;  ?></td>
      </tr>

      <tr>
      	<td class="bg-info"> <span class="p-1"> Despacho: </span> </td>
      	<td><?php echo $Despacho;  ?></td>
      	<td class="bg-info"> <span class="p-1"> email: </span> </td>
      	<td><?php echo $Email;  ?></td>
      </tr>

    </table>

</div>
<!-- Third Form End -->

<?php
if($rowsGrupoClaseProfesor !== null)
if(!isset($rowsGrupoClaseProfesorMod)){?>
 <!-- Four Form Box  Start -->
    <div class="fourFormBox">
        
        <table class="table">
          <tr><td colspan="4" class="bg-secondary text-center">Profesores de la asignatura</td></tr>
          <tr>
              <td class="bg-info"> <span class="p-1"> Grupo </span> </td>
              <td class="bg-info"> <span class="p-1"> Profesor </span> </td>
              <td class="bg-info"> <span class="p-1"> Dpto </span> </td>
              <td class="bg-info"> <span class="p-1"> email </span> </td>
          </tr>
  <?php
  foreach($rowsGrupoClaseProfesor as $grupo){
    $controller = new es\ucm\ControllerImplements();
    $context = new es\ucm\Context(LIST_GRUPO_CLASE_PROFESOR, $grupo->getIdGrupoClase());
    $profesores = $controller->action($context);
    echo'<tr>
    <td>'.$grupo->getLetra().'</td>';
    if($profesores->getEvent() === LIST_GRUPO_CLASE_OK)
    foreach($profesores->getData() as $profesor){
           echo '<td>'.$profesor->getNombre().'</td>
                <td>'.$profesor->getDepartamento().'</td>
              <td>'.$profesor->getEmail().'</td>
            </tr>';
  }
}
      ?>
        </table>
</div>
  <!-- Four Form Box End -->


<!-- Five No Form Box  Start -->

<div >
	
	<table class="table">
      <tr><td colspan="5" class="bg-secondary text-center">Horarios de clases</td></tr>
      <tr>
      	<td rowspan="2" class="bg-info"> <span class="p-1"> Grupo </span> </td>
      	<td colspan="3" class="bg-info"> <span class="p-1"> Horarios clases </span> </td>
      </tr>

      <tr>
      	<td class="bg-info"> <span class="p-1"> Día </span> </td>
      	<td class="bg-info"> <span class="p-1"> Horas </span> </td>
      	<td class="bg-info"> <span class="p-1"> Aula </span> </td>
      </tr>
    
      <?php  
      foreach($rowsGrupoClaseProfesor as $grupo){
    $controller = new es\ucm\ControllerImplements();
    $context = new es\ucm\Context(LIST_HORARIO_CLASE, $grupo->getIdGrupoClase());
    echo "<tr><td>".$grupo->getLetra()."</td>";
    $grupos = $controller->action($context);
    if($grupos->getEvent() === LIST_HORARIO_CLASE_OK)
      foreach($grupos as $g){ ?>  
        	<td><?php echo $g->getDia() ?></td>
        	<td><?php echo $g->getHoraInicio(). " - " . $g->getHoraFinal(); ?></td>
        	<td><?php echo $g->getAula(); ?></td>

      <?php }
    }?>
      </tr>
    </table>

</div>
<?php }else{?>
 <!-- Four Form Box  Start -->
    <div class="fourFormBox">
        
        <table class="table">
          <tr><td colspan="4" class="bg-secondary text-center">Profesores de la asignatura</td></tr>
          <tr>
              <td class="bg-info"> <span class="p-1"> Grupo </span> </td>
              <td class="bg-info"> <span class="p-1"> Profesor </span> </td>
              <td class="bg-info"> <span class="p-1"> Dpto </span> </td>
              <td class="bg-info"> <span class="p-1"> email </span> </td>
          </tr>
  <?php
  foreach($rowsGrupoClaseProfesor as $grupo){
    $controller = new es\ucm\ControllerImplements();
    $context = new es\ucm\Context(LIST_MODGRUPO_CLASE_PROFESOR, $grupo->getIdGrupoClase());
    $profesores = $controller->action($context);
    echo'<tr>
    <td>'.$grupo->getLetra().'</td>';
    if($profesores->getEvent() === LIST_MODGRUPO_CLASE_PROFESOR_OK)
    foreach($profesores->getData() as $profesor){
           echo '<td>'.$profesor->getNombre().'</td>
                <td>'.$profesor->getDepartamento().'</td>
              <td>'.$profesor->getEmail().'</td>
            </tr>';
  }
}
      ?>
        </table>
</div>
  <!-- Four Form Box End -->


<!-- Five No Form Box  Start -->

<div >
	
	<table class="table">
      <tr><td colspan="5" class="bg-secondary text-center">Horarios de clases</td></tr>
      <tr>
      	<td rowspan="2" class="bg-info"> <span class="p-1"> Grupo </span> </td>
      	<td colspan="3" class="bg-info"> <span class="p-1"> Horarios clases </span> </td>
      </tr>

      <tr>
      	<td class="bg-info"> <span class="p-1"> Día </span> </td>
      	<td class="bg-info"> <span class="p-1"> Horas </span> </td>
      	<td class="bg-info"> <span class="p-1"> Aula </span> </td>
      </tr>

      <?php foreach($rowsGrupoClaseProfesor as $grupo){
    $controller = new es\ucm\ControllerImplements();
    $context = new es\ucm\Context(LIST_MODHORARIO_CLASE, $grupo->getIdGrupoClase());
    echo "<tr><td>".$grupo->getLetra()."</td>";
    $grupos = $controller->action($context);
    if($grupos->getEvent()=== LIST_MODHORARIO_CLASE_OK)
      foreach($grupos as $g){ ?>  
        
        	<td><?php echo $g->getDia() ?></td>
        	<td><?php echo $g->getHoraInicio(). " - " . $g->getHoraFinal(); ?></td>
        	<td><?php echo $g->getAula(); ?></td>

      <?php }
    }?>
      </tr>
    </table>

</div>
<?php }?>


<!-- Five Form Box End -->

<!-- Last Form Box  Start -->
<?php if($rowsGrupoLaboratorioProfesor !== null)
if(!isset($rowsGrupoLaboratorioProfesor)){?>
 <!-- Four Form Box  Start -->
    <div class="fiveFormBox">
        
        <table class="table">
          <tr><td colspan="4" class="bg-secondary text-center">Profesores del laboratorio</td></tr>
          <tr>
              <td class="bg-info"> <span class="p-1"> Grupo </span> </td>
              <td class="bg-info"> <span class="p-1"> Profesor </span> </td>
              <td class="bg-info"> <span class="p-1"> Dpto </span> </td>
              <td class="bg-info"> <span class="p-1"> email </span> </td>
          </tr>
  <?php
  foreach($rowsGrupoLaboratorioProfesor as $grupo){
    $controller = new es\ucm\ControllerImplements();
    $context = new es\ucm\Context(LIST_GRUPO_LABORATORIO_PROFESOR, $grupo->getIdGrupoLab());
    $profesores = $controller->action($context);
    echo'<tr>
    <td>'.$grupo->getLetra().'</td>';
    if($profesores->getEvent()===LIST_GRUPO_LABORATORIO_PROFESOR_OK)
    foreach($profesores->getData() as $profesor){
           echo '<td>'.$profesor->getNombre().'</td>
                <td>'.$profesor->getDepartamento().'</td>
              <td>'.$profesor->getEmail().'</td>
            </tr>';
  }
}
      ?>
        </table>
</div>
  <!-- Four Form Box End -->


<!-- Five No Form Box  Start -->

<div >
	
	<table class="table">
      <tr><td colspan="5" class="bg-secondary text-center">Horarios de los laboratorios</td></tr>
      <tr>
      	<td rowspan="2" class="bg-info"> <span class="p-1"> Grupo </span> </td>
      	<td colspan="3" class="bg-info"> <span class="p-1"> Horarios clases </span> </td>
      </tr>

      <tr>
      	<td class="bg-info"> <span class="p-1"> Día </span> </td>
      	<td class="bg-info"> <span class="p-1"> Horas </span> </td>
      	<td class="bg-info"> <span class="p-1"> Aula </span> </td>
      </tr>

      <?php foreach($rowsGrupoLaboratorioProfesor as $grupo){
    $controller = new es\ucm\ControllerImplements();
    $context = new es\ucm\Context(LIST_HORARIO_LABORATORIO, $grupo->getIdGrupoLab());
    echo "<tr><td>".$grupo->getLetra()."</td>";
    $grupos = $controller->action($context);
    if($grupos->getEvent()===LIST_HORARIO_LABORATORIO_OK)
      foreach($grupos as $g) {?>  
        
        	<td><?php echo $g->getDia() ?></td>
        	<td><?php echo $g->getHoraInicio(). " - " . $g->getHoraFinal(); ?></td>
        	<td><?php echo $g->getAula(); ?></td>

      <?php }
    }?>
      </tr>
    </table>

</div>
<?php }else{?>
  <!-- Four Form Box  Start -->
  <div class="fiveFormBox">
        
        <table class="table">
          <tr><td colspan="4" class="bg-secondary text-center">Profesores del laboratorio</td></tr>
          <tr>
              <td class="bg-info"> <span class="p-1"> Grupo </span> </td>
              <td class="bg-info"> <span class="p-1"> Profesor </span> </td>
              <td class="bg-info"> <span class="p-1"> Dpto </span> </td>
              <td class="bg-info"> <span class="p-1"> email </span> </td>
          </tr>
  <?php
  foreach($rowsGrupoLaboratorioProfesor as $grupo){
    $controller = new es\ucm\ControllerImplements();
    $context = new es\ucm\Context(LIST_MODGRUPO_LABORATORIO_PROFESOR, $grupo->getIdGrupoLab());
    $profesores = $controller->action($context);
    echo'<tr>
    <td>'.$grupo->getLetra().'</td>';
    if($profesores->getEvent()===LIST_MODGRUPO_LABORATORIO_OK)
    foreach($profesores->getData() as $profesor){
           echo '<td>'.$profesor->getNombre().'</td>
                <td>'.$profesor->getDepartamento().'</td>
              <td>'.$profesor->getEmail().'</td>
            </tr>';
  }
}
      ?>
        </table>
</div>
  <!-- Four Form Box End -->


<!-- Five No Form Box  Start -->

<div >
	
	<table class="table">
      <tr><td colspan="5" class="bg-secondary text-center">Horarios de los laboratorios</td></tr>
      <tr>
      	<td rowspan="2" class="bg-info"> <span class="p-1"> Grupo </span> </td>
      	<td colspan="3" class="bg-info"> <span class="p-1"> Horarios clases </span> </td>
      </tr>

      <tr>
      	<td class="bg-info"> <span class="p-1"> Día </span> </td>
      	<td class="bg-info"> <span class="p-1"> Horas </span> </td>
      	<td class="bg-info"> <span class="p-1"> Aula </span> </td>
      </tr>

      <?php foreach($rowsGrupoLaboratorioProfesor as $grupo){
    $controller = new es\ucm\ControllerImplements();
    $context = new es\ucm\Context(LIST_MODHORARIO_LABORATORIO, $grupo->getIdGrupoLab());
    echo "<tr><td>".$grupo->getLetra()."</td>";
    $grupos = $controller->action($context);
    if($grupos->getEvent()===LIST_MODHORARIO_LABORATORIO_OK)
      foreach($grupos as $g){ ?>  
        
        	<td><?php echo $g->getDia() ?></td>
        	<td><?php echo $g->getHoraInicio(). " - " . $g->getHoraFinal(); ?></td>
        	<td><?php echo $g->getAula(); ?></td>

      <?php }}?>
      </tr>
    </table>

</div>
<?php }?>
<!-- Last Form Box End -->
<?php if(!empty($GeneralesHTML) || !empty($EspecificasHTML) || !empty($BasicasYTransversalesHTML) || !empty($ResultadosAprendizajeHTML)): ?>
      <div class="contenedor">
        <div class="cabeceras">
            Competencias y Resultados de aprendizaje
        </div>
        <div class="contenido">
              <p><?php if ($GeneralesHTML) echo "<p><b><u>Generales</u></b></p>" . $GeneralesHTML;  ?></p>
              <p><?php if ($EspecificasHTML) echo "<p><b><u>Específicas</u></b></p>" . $EspecificasHTML;  ?></p>
              <p><?php if ($BasicasYTransversalesHTML) echo "<p><b><u>Básicas y Transversales</u></b></p>" . $BasicasYTransversalesHTML;  ?></p>
              <p><?php if ($ResultadosAprendizajeHTML) echo "<p><b><u>Resultados de Aprendizaje</u></b></p>" . $ResultadosAprendizajeHTML;  ?></p>
        </div>
      </div>
<?php endif; ?>
    
<?php if(!empty($BreveDescripcionHTML)){?>
    <div class="contenedor">
      <div class="cabeceras">
          Breve descripción de contenidos
      </div>
      <div class="contenido">
        <?php echo $BreveDescripcionHTML;  ?>
      </div>
    </div>
<?php } ?>

<?php if(!empty($ConocimientosPreviosHTML)){?>
    <div class="contenedor">
      <div class="cabeceras">
          Conocimientos previos necesarios
      </div>
      <div class="contenido">
        <?php echo $ConocimientosPreviosHTML;  ?>
      </div>
    </div>
  

    <?php } ?>

<?php if(!empty($ProgramaTeoricoHTML)){?>
    <div class="contenedor">
      <div class="cabeceras">
        Programa Teorico
      </div>
      <div class="contenido">
        <?php echo $ProgramaTeoricoHTML;  ?>
      </div>
    </div>
    
    <?php } ?>

<?php if(!empty($ProgramaSeminariooHTML)){?>
    <div class="contenedor">
      <div class="cabeceras">
        Programa de Seminario
      </div>
      <div class="contenido">
        <?php echo $ProgramaSeminarioHTML;  ?>
      </div>
    </div>
    
    <?php } ?>

<?php if(!empty($ProgramaLaboratorioHTML)){?>
    <div class="contenedor">
      <div class="cabeceras">
        Programa de Laboratorio
      </div>
      <div class="contenido">
        <?php echo $ProgramaLaboratorioHTML;  ?>
      </div>
    </div>

    <?php } ?>
 


    <div class="contenedor" style="page-break-after: avoid;">
      <div class="cabeceras" style="page-break-after: avoid;">
        Bibliografía
      </div>
      <div class="contenido" style="page-break-after: avoid;">
        <?php echo $CitasBibliograficasHTML;  ?>
      </div>
    </div>



    <div class="contenedor" style="page-break-after: avoid;">
      <div class="cabeceras" style="page-break-after: avoid;">
        Recursos en Internet
      </div>
      <div class="contenido" style="page-break-after: avoid;">
        <?php echo $RecursosInternetHTML;  ?>
      </div>
    </div>


    <div class="contenedor" style="page-break-after: avoid;">
      <div class="cabeceras" style="page-break-after: avoid;">
        Metodología
      </div>
      <div class="contenido" style="page-break-after: avoid;">
        <?php echo $MetodologiaHTML;  ?>
      </div>
    </div>

  <table style="page-break-before: always;">
        <thead>
            <tr>
                <th class="bg-info" colspan="3"><span class="p-1"> Evaluación </span> </th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="bg-info"><span class="p-1">Realización de exámenes </span></td>
                <td class="bg-info"><span class="p-1">Peso: </span></td>
                <td><?php echo $PesoExamenesHTML;  ?></td>
            </tr>

            <tr>
                <td class="text-left" colspan="3"><?php echo $RealizacionExamenesHTML;  ?></td>
            </tr>
    

<?php if(!empty($RealizacionLaboratorioHTML)){?>
             <tr>
                <td class="bg-info"><span class="p-1">Realización Laboratorio </span></td>
                <td class="bg-info"><span class="p-1">Peso: </span></td>
                <td><?php echo $PesoLaboratorioHTML;  ?></td>
            </tr>

            <tr>
                <td class="text-left" colspan="3"><?php echo $RealizacionLaboratorioHTML;  ?></td>
            </tr>

            <?php } ?>
            
<?php if(!empty($RealizacionActividadesHTML)){?>
             <tr>
                <td class="bg-info"><span class="p-1">Otras actividades </span></td>
                <td class="bg-info"><span class="p-1">Peso: </span></td>
                <td><?php echo $PesoActividadesHTML;  ?></td>
            </tr>

            <tr>
                <td class="text-left" colspan="3"><?php echo $RealizacionActividadesHTML;  ?></td>
            </tr>
            <?php } ?>

            <tr>
                <td class="bg-info" colspan="3"><span class="p-1"> Calificación final  </span></td>
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
