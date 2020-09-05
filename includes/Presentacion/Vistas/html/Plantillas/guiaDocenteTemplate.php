<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía Docente</title>

    <link rel="stylesheet" type="text/css" href="css/guiaDocenteTemplate.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 
</head>
<body>


<div class="container">

<!-- Tabla de cabecera -->
<div >
	<table class="table table-bordered headingTbl">
		<thead>
			<tr class="min-h-100 text-left">
				<th class="w-25"><img src="images/escudo.png" alt="escudo ucm" height="100" width="85"/></th>
				<th class="w-50" ><?php echo $NombreGradoHTML;  ?></th>
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
                            <td class="bg-info"><span class="p-1" >Ficha de la <br/> Asignarura: </span></td>
                            <td colspan="4"><?php echo $NombreAsignaturaHTML;  ?></td>
                            <td class="bg-info"><span class="p-1">   Código: </span> </td>
                            <td colspan="2"><?php echo $idAsignatura;  ?></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bg-info"><span class="p-1">Materia: </span></td>
                            <td colspan="3"><?php echo $NombreMateriaHTML;  ?></td>
                            <td class="bg-info"><span class="p-1"> Módulo: </span> </td>
                            <td colspan="3"><?php echo $NombreModuloHTML;  ?></td>
                        </tr>

                        <tr>
                            <td class="bg-info"><span class="p-1">Carácter:  </span></td>
                            <td colspan="3"><?php echo $CaracterHTML;  ?></td>
                            <td class="bg-info"> <span class="p-1"> Curso: </span></td>
                            <td><?php echo $CursoHTML;  ?></td>
                            <td class="bg-info"> <span class="p-1">  Semestre: </span> </td>
                            <td><?php echo $SemestreHTML;  ?></td>
                        </tr>


                        <tr>
                        	<td class="bg-info"><span class="p-1"> Créditos (ECTS)   </span></td>
                        	<td><?php echo $CreditosHTML;  ?></td>
                        	<td rowspan="3" class="align-middle bg-info">
                        		<span class="p-1"> Teóricos </span> </td>
                        	<td><?php echo $CreditosTeoricoHTML;  ?></td>
                        	<td rowspan="3" class="align-middle bg-info">
                        		<span class="p-1"> Problemas </span> </td>
                        	<td><?php echo $CreditosProblemaHTML;  ?></td>
                        	<td rowspan="3" class="align-middle bg-info">
                        		<span class="p-1"> Laboratorio  </span> </td>

                        	<td><?php echo $CreditosLaboratorioHTML;  ?></td>
                        </tr>

                        <tr>
                        	<td class="bg-info"><span class="p-1"> Presencial   </span></td>
                        	<td> <!-- 2 Blank --> </td>
							<!-- 3 Remove -->
                        	<td><?php echo $PresencialHTML;  ?></td>
                        	<!-- 5 No Field Remove -->
                        	<td><?php echo $PresencialProblemaHTML;  ?></td>
                        	<!-- 7 No Field Remove -->
                        	<td><?php echo $PresencialLaboratorioHTML;  ?></td>
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
      	<td colspan="2" class="w-50"><?php echo $CoordinadorHTML;  ?></td>
      	<td class="bg-info"> <span class="p-1">  Dpto:  </span> </td>
      	<td><?php echo $DepartamentoHTML;  ?></td>
      </tr>

      <tr>
      	<td class="bg-info"> <span class="p-1"> Despacho: </span> </td>
      	<td><?php echo $DespachoHTML;  ?></td>
      	<td class="bg-info"> <span class="p-1"> email: </span> </td>
      	<td><?php echo $EmailHTML;  ?></td>
      </tr>

    </table>

</div>
<!-- Third Form End -->

<?php if($rowsgrupoClaseProfesor): ?>
  <!-- Four Form Box  Start -->
  <div class="fourFormBox">
  	
  	<table class="table">
        <tr><td colspan="4" class="bg-secondary text-center">Profesores de la asignatura</td></tr>
        <tr>
        	<td class="bg-info"> <span class="p-1"> Grupo </span> </td>
        	<td class="bg-info"> <span class="p-1"> Profesores </span> </td>
        	<td class="bg-info"> <span class="p-1"> Dpto </span> </td>
        	<td class="bg-info"> <span class="p-1"> email </span> </td>
        </tr>

        <?php foreach($rowsgrupoClaseProfesor as $row): ?>
          <tr>
          	<td><?php echo $row['Letra']; ?></td>
          	<td><?php echo $row['Nombre']; ?></td>
          	<td><?php echo $row['Departamento']; ?></td>
            <td><?php echo $row['Email']; ?></td>
          </tr>
        <?php endforeach; ?>
        
      </table>

  </div>
  <!-- Four Form Box End -->
<?php endif; ?>

<!-- Five No Form Box  Start -->
<?php if($rowsgrupoClaseProfesor): ?>
<div >
	
	<table class="table">
      <tr><td colspan="5" class="bg-secondary text-center">Horarios de clases</td></tr>
      <tr>
      	<td rowspan="2" class="bg-info"> <span class="p-1"> Grupo </span> </td>
      	<td colspan="3" class="bg-info"> <span class="p-1"> Horarios clases </span> </td>
      	<td rowspan="2" class="w-50 bg-info"> <span class="p-1"> Tutorías </span> </td>
      </tr>

      <tr>
      	<td class="bg-info"> <span class="p-1"> Día </span> </td>
      	<td class="bg-info"> <span class="p-1"> Horas </span> </td>
      	<td class="bg-info"> <span class="p-1"> Aula </span> </td>
      </tr>

      <?php foreach($rowsHorario as $i => $row): ?>  
        <tr>
        	<td><?php echo $row['Letra']; ?></td>
        	<td><?php echo $row['Dia']; ?></td>
        	<td><?php echo $row['HoraInicio'] . " - " . $row['HoraFin']; ?></td>
        	<td><?php echo $row['Aula']; ?></td>
          <?php if($i == 0): ?>
            <td rowspan="<?php echo $rowcountHorario; ?>"><?php echo $tutoriaConcatenadas; ?></td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </table>

</div>
<?php endif; ?>

<!-- Five Form Box End -->

<!-- Last Form Box  Start -->
<?php if($rowsHorarioLab): ?>
<div class="FiveFormBox">
	
	<table class="table">
      <tr><td colspan="5" class="bg-secondary text-center">Horarios de Laboratorios</td></tr>
      <tr>
      	<td class="bg-info" rowspan="2"> <span class="p-1"> Grupo </span> </td>
      	<td class="bg-info" colspan="3"> <span class="p-1"> Laboratorio </span> </td>
      	<td class="bg-info" rowspan="2" > <span class="p-1"> Profesores(as) </span> </td>
      </tr>

      <tr>
      	<td class="bg-info"> <span class="p-1"> Día </span> </td>
      	<td class="bg-info"> <span class="p-1"> Horas </span> </td>
      	<td class="bg-info"> <span class="p-1"> Lugar </span> </td>
      </tr>

      <?php foreach($rowsHorarioLab as $i => $row): ?>
      <tr>
      	<td><?php echo $row['Letra']; ?></td>
      	<td><?php echo $row['Dia']; ?></td>
      	<td><?php echo $row['HoraInicio'] . " - " . $row['HoraFin']; ?></td>
      	<td><?php echo $row['Laboratorio']; ?></td>
      	<td><?php echo $row['Nombre']; ?></td>
      </tr>
      <?php endforeach; ?>
    </table>

</div>
<?php endif; ?>
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
    

    <?php if($BreveDescripcionHTML): ?>
    <div class="contenedor">
      <div class="cabeceras">
          Breve descripción de contenidos
      </div>
      <div class="contenido">
        <?php echo $BreveDescripcionHTML;  ?>
      </div>
    </div>
    <?php endif; ?>

    <?php if($ConocimientosPreviosHTML): ?>
    <div class="contenedor">
      <div class="cabeceras">
          Conocimientos previos necesarios
      </div>
      <div class="contenido">
        <?php echo $ConocimientosPreviosHTML;  ?>
      </div>
    </div>
    <?php endif; ?>

    <?php if($ProgramaDetalladoHTML): ?>
    <div class="contenedor">
      <div class="cabeceras">
        Programa de la asignatura
      </div>
      <div class="contenido">
        <?php echo $ProgramaDetalladoHTML;  ?>
      </div>
    </div>
    <?php endif; ?>


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

             <tr>
                <td class="bg-info"><span class="p-1">Realización Laboratorio </span></td>
                <td class="bg-info"><span class="p-1">Peso: </span></td>
                <td><?php echo $PesoLaboratorioHTML;  ?></td>
            </tr>

            <tr>
                <td class="text-left" colspan="3"><?php echo $RealizacionLaboratorioHTML;  ?></td>
            </tr>

             <tr>
                <td class="bg-info"><span class="p-1">Otras actividades </span></td>
                <td class="bg-info"><span class="p-1">Peso: </span></td>
                <td><?php echo $PesoActividadesHTML;  ?></td>
            </tr>

            <tr>
                <td class="text-left" colspan="3"><?php echo $RealizacionActividadesHTML;  ?></td>
            </tr>

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
