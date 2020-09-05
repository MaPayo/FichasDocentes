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
                            <td class="bg-info"><span class="p-1" >subject:</span></td>
                            <td colspan="4"><?php echo $NombreAsignaturaHTML;  ?></td>
                            <td class="bg-info"><span class="p-1">Code: </span> </td>
                            <td colspan="2"><?php echo $idAsignatura;  ?></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bg-info"><span class="p-1">Area: </span></td>
                            <td colspan="3"><?php echo $NombreMateriaHTML;  ?></td>
                            <td class="bg-info"><span class="p-1"> Module: </span> </td>
                            <td colspan="3"><?php echo $NombreModuloHTML;  ?></td>
                        </tr>

                        <tr>
                            <td class="bg-info"><span class="p-1">Character:    </span></td>
                            <td colspan="3"><?php echo $CaracterHTML;  ?></td>
                            <td class="bg-info"> <span class="p-1"> Course: </span></td>
                            <td><?php echo $CursoHTML;  ?></td>
                            <td class="bg-info"> <span class="p-1">  Semester: </span> </td>
                            <td><?php echo $SemestreHTML;  ?></td>
                        </tr>


                        <tr>
                        	<td class="bg-info"><span class="p-1"> Credits (ECTS)   </span></td>
                        	<td><?php echo $CreditosHTML;  ?></td>
                        	<td rowspan="3" class="align-middle bg-info">
                        		<span class="p-1"> Theoretical </span> </td>
                        	<td><?php echo $CreditosTeoricoHTML;  ?></td>
                        	<td rowspan="3" class="align-middle bg-info">
                        		<span class="p-1"> Problems </span> </td>
                        	<td><?php echo $CreditosProblemaHTML;  ?></td>
                        	<td rowspan="3" class="align-middle bg-info">
                        		<span class="p-1"> Laboratory  </span> </td>

                        	<td><?php echo $CreditosLaboratorioHTML;  ?></td>
                        </tr>

                        <tr>
                        	<td class="bg-info"><span class="p-1"> Classroom Credits   </span></td>
                        	<td> <!-- 2 Blank --> </td>
							<!-- 3 Remove -->
                        	<td><?php echo $PresencialHTML;  ?></td>
                        	<!-- 5 No Field Remove -->
                        	<td><?php echo $PresencialProblemaHTML;  ?></td>
                        	<!-- 7 No Field Remove -->
                        	<td><?php echo $PresencialLaboratorioHTML;  ?></td>
                        </tr>
                        <tr>
                        	<td class="bg-info"><span class="p-1"> Total Hours   </span></td>
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
      		<span class="p-1"> Coordinating <br/> Teacher: </span> 
        </td>
      	<td colspan="2" class="w-50"><?php echo $CoordinadorHTML;  ?></td>
      	<td class="bg-info"> <span class="p-1">  Dpto:  </span> </td>
      	<td><?php echo $DepartamentoHTML;  ?></td>
      </tr>

      <tr>
      	<td class="bg-info"> <span class="p-1"> Office: </span> </td>
      	<td><?php echo $DespachoHTML;  ?></td>
      	<td class="bg-info"> <span class="p-1"> Email: </span> </td>
      	<td><?php echo $EmailHTML;  ?></td>
      </tr>

    </table>

</div>
<!-- Third Form End -->

<?php if($rowsgrupoClaseProfesor): ?>
  <!-- Four Form Box  Start -->
  <div class="fourFormBox">
  	
  	<table class="table">
        <tr><td colspan="4" class="bg-secondary text-center">Teachers of the Subject</td></tr>
        <tr>
        	<td class="bg-info"> <span class="p-1"> Group </span> </td>
        	<td class="bg-info"> <span class="p-1"> Teachers </span> </td>
        	<td class="bg-info"> <span class="p-1"> Department </span> </td>
        	<td class="bg-info"> <span class="p-1"> Email </span> </td>
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
      <tr><td colspan="5" class="bg-secondary text-center">Class Schedule</td></tr>
      <tr>
      	<td rowspan="2" class="bg-info"> <span class="p-1"> Group </span> </td>
      	<td colspan="3" class="bg-info"> <span class="p-1"> Class schedule </span> </td>
      	<td rowspan="2" class="w-50 bg-info"> <span class="p-1"> Tutoring </span> </td>
      </tr>

      <tr>
      	<td class="bg-info"> <span class="p-1"> Day </span> </td>
      	<td class="bg-info"> <span class="p-1"> Hours </span> </td>
      	<td class="bg-info"> <span class="p-1"> Classroom </span> </td>
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
      <tr><td colspan="5" class="bg-secondary text-center">Laboratory Hours</td></tr>
      <tr>
      	<td class="bg-info" rowspan="2"> <span class="p-1"> Group </span> </td>
      	<td class="bg-info" colspan="3"> <span class="p-1"> Laboratory </span> </td>
      	<td class="bg-info" rowspan="2" > <span class="p-1"> Teachers </span> </td>
      </tr>

      <tr>
      	<td class="bg-info"> <span class="p-1"> Day </span> </td>
      	<td class="bg-info"> <span class="p-1"> Hours </span> </td>
      	<td class="bg-info"> <span class="p-1"> Classroom </span> </td>
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

    <?php if($BreveDescripcionHTML): ?> 
    <div class="contenedor">
      <div class="cabeceras">
          Brief description of content
      </div>
      <div class="contenido">
        <?php echo $BreveDescripcionHTML;  ?>
      </div>
    </div>
    <?php endif; ?>

    <?php if($ConocimientosPreviosHTML): ?>
    <div class="contenedor">
      <div class="cabeceras">
          Required background knowledge
      </div>
      <div class="contenido">
        <?php echo $ConocimientosPreviosHTML;  ?>
      </div>
    </div>
    <?php endif; ?>


    <?php if($ProgramaDetalladoHTML): ?>
    <div class="contenedor">
      <div class="cabeceras">
         Subject Program
      </div>
      <div class="contenido">
        <?php echo $ProgramaDetalladoHTML;  ?>
      </div>
    </div>
    <?php endif; ?>

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

             <tr>
                <td class="bg-info"><span class="p-1">Laboratory Development </span></td>
                <td class="bg-info"><span class="p-1">% of total: </span></td>
                <td><?php echo $PesoLaboratorioHTML;  ?></td>
            </tr>

            <tr>
                <td class="text-left" colspan="3"><?php echo $RealizacionLaboratorioHTML;  ?></td>
            </tr>

             <tr>
                <td class="bg-info"><span class="p-1">Other Activities </span></td>
                <td class="bg-info"><span class="p-1">% of total: </span></td>
                <td><?php echo $PesoActividadesHTML;  ?></td>
            </tr>

            <tr>
                <td class="text-left" colspan="3"><?php echo $RealizacionActividadesHTML;  ?></td>
            </tr>

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
