<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/FactoryCommand.php');

require_once('includes/Presentacion/FactoriaComandos/Administrador/CommandCreateAdministrador.php');
require_once('includes/Presentacion/FactoriaComandos/Administrador/CommandDeleteAdministrador.php');
require_once('includes/Presentacion/FactoriaComandos/Administrador/CommandFindAdministrador.php');
require_once('includes/Presentacion/FactoriaComandos/Administrador/CommandUpdateAdministrador.php');

require_once('includes/Presentacion/FactoriaComandos/Asignatura/CommandCreateAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/Asignatura/CommandDeleteAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/Asignatura/CommandFindAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/Asignatura/CommandUpdateAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/Asignatura/CommandListAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/Asignatura/CommandCreateModAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/Asignatura/CommandDeleteModAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/Asignatura/CommandFindModAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/Asignatura/CommandUpdateModAsignatura.php');

require_once('includes/Presentacion/FactoriaComandos/Bibliografia/CommandCreateBibliografia.php');
require_once('includes/Presentacion/FactoriaComandos/Bibliografia/CommandDeleteBibliografia.php');
require_once('includes/Presentacion/FactoriaComandos/Bibliografia/CommandFindBibliografia.php');
require_once('includes/Presentacion/FactoriaComandos/Bibliografia/CommandUpdateBibliografia.php');
require_once('includes/Presentacion/FactoriaComandos/Bibliografia/CommandCreateModBibliografia.php');
require_once('includes/Presentacion/FactoriaComandos/Bibliografia/CommandDeleteModBibliografia.php');
require_once('includes/Presentacion/FactoriaComandos/Bibliografia/CommandFindModBibliografia.php');
require_once('includes/Presentacion/FactoriaComandos/Bibliografia/CommandUpdateModBibliografia.php');

require_once('includes/Presentacion/FactoriaComandos/CompetenciasAsignatura/CommandCreateCompetenciasAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/CompetenciasAsignatura/CommandDeleteCompetenciasAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/CompetenciasAsignatura/CommandFindCompetenciasAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/CompetenciasAsignatura/CommandUpdateCompetenciasAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/CompetenciasAsignatura/CommandCreateModCompetenciasAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/CompetenciasAsignatura/CommandDeleteModCompetenciasAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/CompetenciasAsignatura/CommandFindModCompetenciasAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/CompetenciasAsignatura/CommandUpdateModCompetenciasAsignatura.php');

require_once('includes/Presentacion/FactoriaComandos/Configuracion/CommandCreateConfiguracion.php');
require_once('includes/Presentacion/FactoriaComandos/Configuracion/CommandDeleteConfiguracion.php');
require_once('includes/Presentacion/FactoriaComandos/Configuracion/CommandFindConfiguracion.php');
require_once('includes/Presentacion/FactoriaComandos/Configuracion/CommandUpdateConfiguracion.php');

require_once('includes/Presentacion/FactoriaComandos/Evaluacion/CommandCreateEvaluacion.php');
require_once('includes/Presentacion/FactoriaComandos/Evaluacion/CommandDeleteEvaluacion.php');
require_once('includes/Presentacion/FactoriaComandos/Evaluacion/CommandFindEvaluacion.php');
require_once('includes/Presentacion/FactoriaComandos/Evaluacion/CommandUpdateEvaluacion.php');
require_once('includes/Presentacion/FactoriaComandos/Evaluacion/CommandCreateModEvaluacion.php');
require_once('includes/Presentacion/FactoriaComandos/Evaluacion/CommandDeleteModEvaluacion.php');
require_once('includes/Presentacion/FactoriaComandos/Evaluacion/CommandFindModEvaluacion.php');
require_once('includes/Presentacion/FactoriaComandos/Evaluacion/CommandUpdateModEvaluacion.php');

require_once('includes/Presentacion/FactoriaComandos/Grado/CommandCreateGrado.php');
require_once('includes/Presentacion/FactoriaComandos/Grado/CommandDeleteGrado.php');
require_once('includes/Presentacion/FactoriaComandos/Grado/CommandFindGrado.php');
require_once('includes/Presentacion/FactoriaComandos/Grado/CommandListGrado.php');
require_once('includes/Presentacion/FactoriaComandos/Grado/CommandUpdateGrado.php');

require_once('includes/Presentacion/FactoriaComandos/GrupoClase/CommandCreateGrupoClase.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClase/CommandDeleteGrupoClase.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClase/CommandFindGrupoClase.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClase/CommandFindGrupoClaseLetra.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClase/CommandListGrupoClase.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClase/CommandUpdateGrupoClase.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClase/CommandCreateModGrupoClase.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClase/CommandDeleteModGrupoClase.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClase/CommandFindModGrupoClase.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClase/CommandListModGrupoClase.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClase/CommandUpdateModGrupoClase.php');

require_once('includes/Presentacion/FactoriaComandos/GrupoClaseProfesor/CommandCreateGrupoClaseProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClaseProfesor/CommandDeleteGrupoClaseProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClaseProfesor/CommandFindGrupoClaseProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClaseProfesor/CommandListGrupoClaseProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClaseProfesor/CommandUpdateGrupoClaseProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClaseProfesor/CommandCreateModGrupoClaseProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClaseProfesor/CommandDeleteModGrupoClaseProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClaseProfesor/CommandFindModGrupoClaseProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClaseProfesor/CommandListModGrupoClaseProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClaseProfesor/CommandUpdateModGrupoClaseProfesor.php');

require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorio/CommandCreateGrupoLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorio/CommandDeleteGrupoLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorio/CommandFindGrupoLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorio/CommandFindGrupoLaboratorioLetra.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorio/CommandListGrupoLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorio/CommandUpdateGrupoLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorio/CommandCreateModGrupoLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorio/CommandDeleteModGrupoLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorio/CommandFindModGrupoLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorio/CommandListModGrupoLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorio/CommandUpdateModGrupoLaboratorio.php');

require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorioProfesor/CommandCreateGrupoLaboratorioProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorioProfesor/CommandDeleteGrupoLaboratorioProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorioProfesor/CommandFindGrupoLaboratorioProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorioProfesor/CommandListGrupoLaboratorioProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorioProfesor/CommandUpdateGrupoLaboratorioProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorioProfesor/CommandCreateModGrupoLaboratorioProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorioProfesor/CommandDeleteModGrupoLaboratorioProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorioProfesor/CommandFindModGrupoLaboratorioProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorioProfesor/CommandListModGrupoLaboratorioProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorioProfesor/CommandUpdateModGrupoLaboratorioProfesor.php');

require_once('includes/Presentacion/FactoriaComandos/HorarioClase/CommandCreateHorarioClase.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioClase/CommandDeleteHorarioClase.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioClase/CommandFindHorarioClase.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioClase/CommandFindHorarioClaseGrupoyDia.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioClase/CommandListHorarioClase.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioClase/CommandUpdateHorarioClase.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioClase/CommandCreateModHorarioClase.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioClase/CommandDeleteModHorarioClase.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioClase/CommandFindModHorarioClase.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioClase/CommandListModHorarioClase.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioClase/CommandUpdateModHorarioClase.php');

require_once('includes/Presentacion/FactoriaComandos/HorarioLaboratorio/CommandCreateHorarioLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioLaboratorio/CommandDeleteHorarioLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioLaboratorio/CommandFindHorarioLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioLaboratorio/CommandListHorarioLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioLaboratorio/CommandUpdateHorarioLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioLaboratorio/CommandCreateModHorarioLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioLaboratorio/CommandDeleteModHorarioLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioLaboratorio/CommandFindModHorarioLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioLaboratorio/CommandListModHorarioLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioLaboratorio/CommandUpdateModHorarioLaboratorio.php');

require_once('includes/Presentacion/FactoriaComandos/Laboratorio/CommandFindLaboratorio.php');

require_once('includes/Presentacion/FactoriaComandos/Laboratorio/CommandCreateLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/Laboratorio/CommandDeleteLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/Laboratorio/CommandUpdateLaboratorio.php');

require_once('includes/Presentacion/FactoriaComandos/Materia/CommandFindMateria.php');
require_once('includes/Presentacion/FactoriaComandos/Materia/CommandListMateria.php');

require_once('includes/Presentacion/FactoriaComandos/Materia/CommandCreateMateria.php');
require_once('includes/Presentacion/FactoriaComandos/Materia/CommandUpdateMateria.php');
require_once('includes/Presentacion/FactoriaComandos/Materia/CommandDeleteMateria.php');

require_once('includes/Presentacion/FactoriaComandos/Metodologia/CommandFindMetodologia.php');
require_once('includes/Presentacion/FactoriaComandos/Metodologia/CommandCreateMetodologia.php');
require_once('includes/Presentacion/FactoriaComandos/Metodologia/CommandUpdateMetodologia.php');
require_once('includes/Presentacion/FactoriaComandos/Metodologia/CommandDeleteMetodologia.php');
require_once('includes/Presentacion/FactoriaComandos/Metodologia/CommandFindModMetodologia.php');
require_once('includes/Presentacion/FactoriaComandos/Metodologia/CommandCreateModMetodologia.php');
require_once('includes/Presentacion/FactoriaComandos/Metodologia/CommandDeleteModMetodologia.php');
require_once('includes/Presentacion/FactoriaComandos/Metodologia/CommandUpdateModMetodologia.php');

require_once('includes/Presentacion/FactoriaComandos/Modulo/CommandFindModulo.php');
require_once('includes/Presentacion/FactoriaComandos/Modulo/CommandListModulo.php');
require_once('includes/Presentacion/FactoriaComandos/Modulo/CommandCreateModulo.php');
require_once('includes/Presentacion/FactoriaComandos/Modulo/CommandDeleteModulo.php');
require_once('includes/Presentacion/FactoriaComandos/Modulo/CommandUpdateModulo.php');

require_once('includes/Presentacion/FactoriaComandos/Permisos/CommandFindPermisos.php');
require_once('includes/Presentacion/FactoriaComandos/Permisos/CommandDeletePermisos.php');
require_once('includes/Presentacion/FactoriaComandos/Permisos/CommandCreatePermisos.php');

require_once('includes/Presentacion/FactoriaComandos/Permisos/CommandUpdatePermisos.php');
require_once('includes/Presentacion/FactoriaComandos/Permisos/CommandFindPermisosPorProfesor.php');

require_once('includes/Presentacion/FactoriaComandos/Permisos/CommandFindPermisosPorProfesorYAsignatura.php');

require_once('includes/Presentacion/FactoriaComandos/Problema/CommandFindProblema.php');
require_once('includes/Presentacion/FactoriaComandos/Problema/CommandDeleteProblema.php');
require_once('includes/Presentacion/FactoriaComandos/Problema/CommandCreateProblema.php');
require_once('includes/Presentacion/FactoriaComandos/Problema/CommandUpdateProblema.php');

require_once('includes/Presentacion/FactoriaComandos/Profesor/CommandFindProfesor.php');

require_once('includes/Presentacion/FactoriaComandos/ProgramaAsignatura/CommandFindProgramaAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/ProgramaAsignatura/CommandCreateProgramaAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/ProgramaAsignatura/CommandUpdateProgramaAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/ProgramaAsignatura/CommandDeleteProgramaAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/ProgramaAsignatura/CommandFindModProgramaAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/ProgramaAsignatura/CommandCreateModProgramaAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/ProgramaAsignatura/CommandDeleteModProgramaAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/ProgramaAsignatura/CommandUpdateModProgramaAsignatura.php');

require_once('includes/Presentacion/FactoriaComandos/Teorico/CommandFindTeorico.php');
require_once('includes/Presentacion/FactoriaComandos/Teorico/CommandDeleteTeorico.php');
require_once('includes/Presentacion/FactoriaComandos/Teorico/CommandCreateTeorico.php');
require_once('includes/Presentacion/FactoriaComandos/Teorico/CommandUpdateTeorico.php');

require_once('includes/Presentacion/FactoriaComandos/Usuario/CommandFindUsuario.php');
require_once('includes/Presentacion/FactoriaComandos/Usuario/CommandFindUsuarios.php');

require_once('includes/Presentacion/FactoriaComandos/Verifica/CommandFindVerifica.php');
require_once('includes/Presentacion/FactoriaComandos/Verifica/CommandUpdateVerifica.php');

require_once('includes/Presentacion/FactoriaComandos/Comparacion/CommandComparacion.php');
require_once('includes/Presentacion/FactoriaComandos/Conversion/CommandConvertMarkdownToHTML.php');

class FactoryCommandImplements extends FactoryCommand
{

    public function getCommand($event)
    {
        $command = null;
        switch ($event) {
            case CREATE_ADMINISTRADOR:
                $command = new CommandCreateAdministrador();
                break;
            case DELETE_ADMINISTRADOR:
                $command = new CommandDeleteAdministrador();
                break;
            case UPDATE_ADMINISTRADOR:
                $command = new CommandUpdateAdministrador();
                break;
            case FIND_ADMINISTRADOR:
                $command = new CommandFindAdministrador();
                break;
            case LIST_ADMINISTRADOR:
                $command = new CommandListAdministrador();
                break;
            case CREATE_ASIGNATURA:
                $command = new CommandCreateAsignatura();
                break;
            case DELETE_ASIGNATURA:
                $command = new CommandDeleteAsignatura();
                break;
            case UPDATE_ASIGNATURA:
                $command = new CommandUpdateAsignatura();
                break;
            case FIND_ASIGNATURA:
                $command = new CommandFindAsignatura();
                break;
            case LIST_ASIGNATURA:
                $command = new CommandListAsignatura();
                break;
            case CREATE_MODASIGNATURA:
                $command = new CommandCreateModAsignatura();
                break;
            case DELETE_MODASIGNATURA:
                $command = new CommandDeleteModAsignatura();
                break;
            case UPDATE_MODASIGNATURA:
                $command = new CommandUpdateModAsignatura();
                break;
            case FIND_MODASIGNATURA:
                $command = new CommandFindModAsignatura();
                break;
            case CREATE_BIBLIOGRAFIA:
                $command = new CommandCreateBibliografia();
                break;
            case DELETE_BIBLIOGRAFIA:
                $command = new CommandDeleteBibliografia();
                break;
            case UPDATE_BIBLIOGRAFIA:
                $command = new CommandUpdateBibliografia();
                break;
            case FIND_BIBLIOGRAFIA:
                $command = new CommandFindBibliografia();
                break;
            case CREATE_MODBIBLIOGRAFIA:
                $command = new CommandCreateModBibliografia();
                break;
            case DELETE_MODBIBLIOGRAFIA:
                $command = new CommandDeleteModBibliografia();
                break;
            case UPDATE_MODBIBLIOGRAFIA:
                $command = new CommandUpdateModBibliografia();
                break;
            case FIND_MODBIBLIOGRAFIA:
                $command = new CommandFindModBibliografia();
                break;
            case CREATE_COMPETENCIAS_ASIGNATURA:
                $command = new CommandCreateCompetenciasAsignatura();
                break;
            case DELETE_COMPETENCIAS_ASIGNATURA:
                $command = new CommandDeleteCompetenciasAsignatura();
                break;
            case UPDATE_COMPETENCIAS_ASIGNATURA:
                $command = new CommandUpdateCompetenciasAsignatura();
                break;
            case FIND_COMPETENCIAS_ASIGNATURA:
                $command = new CommandFindCompetenciasAsignatura();
                break;
            case CREATE_MODCOMPETENCIAS_ASIGNATURA:
                $command = new CommandCreateModCompetenciasAsignatura();
                break;
            case DELETE_MODCOMPETENCIAS_ASIGNATURA:
                $command = new CommandDeleteModCompetenciasAsignatura();
                break;
            case UPDATE_MODCOMPETENCIAS_ASIGNATURA:
                $command = new CommandUpdateModCompetenciasAsignatura();
                break;
            case FIND_MODCOMPETENCIAS_ASIGNATURA:
                $command = new CommandFindModCompetenciasAsignatura();
                break;
            case CREATE_CONFIGURACION:
                $command = new CommandCreateConfiguracion();
                break;
            case DELETE_CONFIGURACION:
                $command = new CommandDeleteConfiguracion();
                break;
            case UPDATE_CONFIGURACION:
                $command = new CommandUpdateConfiguracion();
                break;
            case FIND_CONFIGURACION:
                $command = new CommandFindConfiguracion();
                break;
            case CREATE_EVALUACION:
                $command = new CommandCreateEvaluacion();
                break;
            case DELETE_EVALUACION:
                $command = new CommandDeleteEvaluacion();
                break;
            case UPDATE_EVALUACION:
                $command = new CommandUpdateEvaluacion();
                break;
            case FIND_EVALUACION:
                $command = new CommandFindEvaluacion();
                break;
            case CREATE_MODEVALUACION:
                $command = new CommandCreateModEvaluacion();
                break;
            case DELETE_MODEVALUACION:
                $command = new CommandDeleteModEvaluacion();
                break;
            case UPDATE_MODEVALUACION:
                $command = new CommandUpdateModEvaluacion();
                break;
            case FIND_MODEVALUACION:
                $command = new CommandFindModEvaluacion();
                break;
            case CREATE_GRADO:
                $command = new CommandCreateGrado();
                break;
            case DELETE_GRADO:
                $command = new CommandDeleteGrado();
                break;
            case UPDATE_GRADO:
                $command = new CommandUpdateGrado();
                break;
            case FIND_GRADO:
                $command = new CommandFindGrado();
                break;
            case LIST_GRADO:
                $command = new CommandListGrado();
                break;
            case CREATE_GRUPO_CLASE:
                $command = new CommandCreateGrupoClase();
                break;
            case DELETE_GRUPO_CLASE:
                $command = new CommandDeleteGrupoClase();
                break;
            case UPDATE_GRUPO_CLASE:
                $command = new CommandUpdateGrupoClase();
                break;
            case FIND_GRUPO_CLASE:
                $command = new CommandFindGrupoClase();
                break;
            /*case FIND_GRUPO_CLASE_LETRA:
                $command = new CommandFindGrupoClaseLetra();
                break;*/
            case LIST_GRUPO_CLASE:
                $command = new CommandListGrupoClase();
                break;
            case CREATE_MODGRUPO_CLASE:
                $command = new CommandCreateModGrupoClase();
                break;
            case DELETE_MODGRUPO_CLASE:
                $command = new CommandDeleteModGrupoClase();
                break;
            case UPDATE_MODGRUPO_CLASE:
                $command = new CommandUpdateModGrupoClase();
                break;
            case FIND_MODGRUPO_CLASE:
                $command = new CommandFindModGrupoClase();
                break;
            case LIST_MODGRUPO_CLASE:
                $command = new CommandListModGrupoClase();
                break;
            case CREATE_GRUPO_LABORATORIO:
                $command = new CommandCreateGrupoLaboratorio();
                break;
            case DELETE_GRUPO_LABORATORIO:
                $command = new CommandDeleteGrupoLaboratorio();
                break;
            case UPDATE_GRUPO_LABORATORIO:
                $command = new CommandUpdateGrupoLaboratorio();
                break;
            case FIND_GRUPO_LABORATORIO:
                $command = new CommandFindGrupoLaboratorio();
                break;
            /*case FIND_GRUPO_LABORATORIO_LETRA:
                $command = new CommandFindGrupoLaboratorioLetra();
                break;*/
            case LIST_GRUPO_LABORATORIO:
                $command = new CommandListGrupoLaboratorio();
                break;
            case CREATE_MODGRUPO_LABORATORIO:
                $command = new CommandCreateModGrupoLaboratorio();
                break;
            case DELETE_MODGRUPO_LABORATORIO:
                $command = new CommandDeleteModGrupoLaboratorio();
                break;
            case UPDATE_MODGRUPO_LABORATORIO:
                $command = new CommandUpdateModGrupoLaboratorio();
                break;
            case FIND_MODGRUPO_LABORATORIO:
                $command = new CommandFindModGrupoLaboratorio();
                break;
            case LIST_MODGRUPO_LABORATORIO:
                $command = new CommandListModGrupoLaboratorio();
                break;
            case CREATE_GRUPO_CLASE_PROFESOR:
                $command = new CommandCreateGrupoClaseProfesor();
                break;
            case DELETE_GRUPO_CLASE_PROFESOR:
                $command = new CommandDeleteGrupoClaseProfesor();
                break;
            case UPDATE_GRUPO_CLASE_PROFESOR:
                $command = new CommandUpdateGrupoClaseProfesor();
                break;
            case FIND_GRUPO_CLASE_PROFESOR:
                $command = new CommandFindGrupoClaseProfesor();
                break;
            case LIST_GRUPO_CLASE_PROFESOR:
                $command = new CommandListGrupoClaseProfesor();
                break;
            case CREATE_MODGRUPO_CLASE_PROFESOR:
                $command = new CommandCreateModGrupoClaseProfesor();
                break;
            case DELETE_MODGRUPO_CLASE_PROFESOR:
                $command = new CommandDeleteModGrupoClaseProfesor();
                break;
            case UPDATE_MODGRUPO_CLASE_PROFESOR:
                $command = new CommandUpdateModGrupoClaseProfesor();
                break;
            case FIND_MODGRUPO_CLASE_PROFESOR:
                $command = new CommandFindModGrupoClaseProfesor();
                break;
            case LIST_MODGRUPO_CLASE_PROFESOR:
                $command = new CommandListModGrupoClaseProfesor();
                break;
            case CREATE_GRUPO_LABORATORIO_PROFESOR:
                $command = new CommandCreateGrupoLaboratorioProfesor();
                break;
            case DELETE_GRUPO_LABORATORIO_PROFESOR:
                $command = new CommandDeleteGrupoLaboratorioProfesor();
                break;
            case UPDATE_GRUPO_LABORATORIO_PROFESOR:
                $command = new CommandUpdateGrupoLaboratorioProfesor();
                break;
            case FIND_GRUPO_LABORATORIO_PROFESOR:
                $command = new CommandFindGrupoLaboratorioProfesor();
                break;
            case LIST_GRUPO_LABORATORIO_PROFESOR:
                $command = new CommandListGrupoLaboratorioProfesor();
                break;
            case CREATE_MODGRUPO_LABORATORIO_PROFESOR:
                $command = new CommandCreateModGrupoLaboratorioProfesor();
                break;
            case DELETE_MODGRUPO_LABORATORIO_PROFESOR:
                $command = new CommandDeleteModGrupoLaboratorioProfesor();
                break;
            case UPDATE_MODGRUPO_LABORATORIO_PROFESOR:
                $command = new CommandUpdateModGrupoLaboratorioProfesor();
                break;
            case FIND_MODGRUPO_LABORATORIO_PROFESOR:
                $command = new CommandFindModGrupoLaboratorioProfesor();
                break;
            case LIST_MODGRUPO_LABORATORIO_PROFESOR:
                $command = new CommandListModGrupoLaboratorioProfesor();
                break;
            case CREATE_HORARIO_CLASE:
                $command = new CommandCreateHorarioClase();
                break;
            case DELETE_HORARIO_CLASE:
                $command = new CommandDeleteHorarioClase();
                break;
            case UPDATE_HORARIO_CLASE:
                $command = new CommandUpdateHorarioClase();
                break;
            case FIND_HORARIO_CLASE:
                $command = new CommandFindHorarioClase();
                break;
            /*case FIND_HORARIO_CLASE_GRUPO_DIA:
                    $command = new CommandFindHorarioClaseGrupoyDia();
                    break;*/
            case LIST_HORARIO_CLASE:
                $command = new CommandListHorarioClase();
                break;
            case CREATE_MODHORARIO_CLASE:
                $command = new CommandCreateModHorarioClase();
                break;
            case DELETE_MODHORARIO_CLASE:
                $command = new CommandDeleteModHorarioClase();
                break;
            case UPDATE_MODHORARIO_CLASE:
                $command = new CommandUpdateModHorarioClase();
                break;
            case FIND_MODHORARIO_CLASE:
                $command = new CommandFindModHorarioClase();
                break;
            case LIST_MODHORARIO_CLASE:
                $command = new CommandListModHorarioClase();
                break;
            case CREATE_HORARIO_LABORATORIO:
                $command = new CommandCreateHorarioLaboratorio();
                break;
            case DELETE_HORARIO_LABORATORIO:
                $command = new CommandDeleteHorarioLaboratorio();
                break;
            case UPDATE_HORARIO_LABORATORIO:
                $command = new CommandUpdateHorarioLaboratorio();
                break;
            case FIND_HORARIO_LABORATORIO:
                $command = new CommandFindHorarioLaboratorio();
                break;
            /*case FIND_HORARIO_LABORATORIO_GRUPO_DIA:
                $command = new CommandFindHorarioLaboratorioGrupoyDia();
                break;*/
            case LIST_HORARIO_LABORATORIO:
                $command = new CommandListHorarioLaboratorio();
                break;
            case CREATE_MODHORARIO_LABORATORIO:
                $command = new CommandCreateModHorarioLaboratorio();
                break;
            case DELETE_MODHORARIO_LABORATORIO:
                $command = new CommandDeleteModHorarioLaboratorio();
                break;
            case UPDATE_MODHORARIO_LABORATORIO:
                $command = new CommandUpdateModHorarioLaboratorio();
                break;
            case FIND_MODHORARIO_LABORATORIO:
                $command = new CommandFindModHorarioLaboratorio();
                break;
            case LIST_MODHORARIO_LABORATORIO:
                $command = new CommandListModHorarioLaboratorio();
                break;
            case CREATE_LABORATORIO:
                $command = new CommandCreateLaboratorio();
                break;
            case DELETE_LABORATORIO:
                $command = new CommandDeleteLaboratorio();
                break;
            case UPDATE_LABORATORIO:
                $command = new CommandUpdateLaboratorio();
                break;
            case FIND_LABORATORIO:
                $command = new CommandFindLaboratorio();
                break;
            case CREATE_LEYENDA:
                $command = new CommandCreateLeyenda();
                break;
            case DELETE_LEYENDA:
                $command = new CommandDeleteLeyenda();
                break;
            case UPDATE_LEYENDA:
                $command = new CommandUpdateLeyenda();
                break;
            case FIND_LEYENDA:
                $command = new CommandFindLeyenda();
                break;
            case CREATE_MATERIA:
                $command = new CommandCreateMateria();
                break;
            case DELETE_MATERIA:
                $command = new CommandDeleteMateria();
                break;
            case UPDATE_MATERIA:
                $command = new CommandUpdateMateria();
                break;
            case FIND_MATERIA:
                $command = new CommandFindMateria();
                break;
            case LIST_MATERIA:
                $command = new CommandListMateria();
                break;
            case CREATE_METODOLOGIA:
                $command = new CommandCreateMetodologia();
                break;
            case DELETE_METODOLOGIA:
                $command = new CommandDeleteMetodologia();
                break;
            case UPDATE_METODOLOGIA:
                $command = new CommandUpdateMetodologia();
                break;
            case FIND_METODOLOGIA:
                $command = new CommandFindMetodologia();
                break;
            case CREATE_MODMETODOLOGIA:
                $command = new CommandCreateModMetodologia();
                break;
            case DELETE_MODMETODOLOGIA:
                $command = new CommandDeleteModMetodologia();
                break;
            case UPDATE_MODMETODOLOGIA:
                $command = new CommandUpdateModMetodologia();
                break;
            case FIND_MODMETODOLOGIA:
                $command = new CommandFindModMetodologia();
                break;
            case CREATE_MODULO:
                $command = new CommandCreateModulo();
                break;
            case DELETE_MODULO:
                $command = new CommandDeleteModulo();
                break;
            case UPDATE_MODULO:
                $command = new CommandUpdateModulo();
                break;
            case FIND_MODULO:
                $command = new CommandFindModulo();
                break;
            case LIST_MODULO:
                $command = new CommandListModulo();
                break;
            case CREATE_PERMISOS:
                $command = new CommandCreatePermisos();
                break;
            case DELETE_PERMISOS:
                $command = new CommandDeletePermisos();
                break;
            case UPDATE_PERMISOS:
                $command = new CommandUpdatePermisos();
                break;
            case CREATE_PERMISOS:
                $command = new CommandCreatePermisos();
                break;
            case FIND_PERMISOS:
                $command = new CommandFindPermisos();
                break;
            case DELETE_PERMISOS:
                $command = new CommandDeletePermisos();
                break;
            case FIND_PERMISOS_POR_PROFESOR:
                $command = new CommandFindPermisosPorProfesor();
                break;
            case FIND_PERMISOS_POR_PROFESOR_Y_ASIGNATURA:
                $command = new CommandFindPermisosPorProfesorYAsignatura();
                break;
            case CREATE_PROBLEMA:
                $command = new CommandCreateProblema();
                break;
            case DELETE_PROBLEMA:
                $command = new CommandDeleteProblema();
                break;
            case UPDATE_PROBLEMA:
                $command = new CommandUpdateProblema();
                break;
            case FIND_PROBLEMA:
                $command = new CommandFindProblema();
                break;
            case CREATE_PROFESOR:
                $command = new CommandCreateProfesor();
                break;
            case DELETE_PROFESOR:
                $command = new CommandDeleteProfesor();
                break;
            case UPDATE_PROFESOR:
                $command = new CommandUpdateProfesor();
                break;
            case FIND_PROFESOR:
                $command = new CommandFindProfesor();
                break;
            case CREATE_PROGRAMA_ASIGNATURA:
                $command = new CommandCreateProgramaAsignatura();
                break;
            case DELETE_PROGRAMA_ASIGNATURA:
                $command = new CommandDeleteProgramaAsignatura();
                break;
            case UPDATE_PROGRAMA_ASIGNATURA:
                $command = new CommandUpdateProgramaAsignatura();
                break;
            case FIND_PROGRAMA_ASIGNATURA:
                $command = new CommandFindProgramaAsignatura();
                break;
            case CREATE_MODPROGRAMA_ASIGNATURA:
                $command = new CommandCreateModProgramaAsignatura();
                break;
            case DELETE_MODPROGRAMA_ASIGNATURA:
                $command = new CommandDeleteModProgramaAsignatura();
                break;
            case UPDATE_MODPROGRAMA_ASIGNATURA:
                $command = new CommandUpdateModProgramaAsignatura();
                break;
            case FIND_MODPROGRAMA_ASIGNATURA:
                $command = new CommandFindModProgramaAsignatura();
                break;
            case CREATE_TEORICO:
                $command = new CommandCreateTeorico();
                break;
            case DELETE_TEORICO:
                $command = new CommandDeleteTeorico();
                break;
            case UPDATE_TEORICO:
                $command = new CommandUpdateTeorico();
                break;
            case FIND_TEORICO:
                $command = new CommandFindTeorico();
                break;
            case CREATE_USUARIO:
                $command = new CommandCreateUsuario();
                break;
            case DELETE_USUARIO:
                $command = new CommandDeleteUsuario();
                break;
            case UPDATE_USUARIO:
                $command = new CommandUpdateUsuario();
                break;
                case FIND_USUARIOS:
                    $command = new CommandFindUsuarios();
                    break;
                /*case CONVERSION_HTML:
                $command = new CommandConvertMarkdownToHTML();
                break;*/
            case FIND_USUARIO:
                $command = new CommandFindUsuario();
                break;
            case CREATE_VERIFICA:
                $command = new CommandCreateVerifica();
                break;
            case DELETE_VERIFICA:
                $command = new CommandDeleteVerifica();
                break;
            case UPDATE_VERIFICA:
                $command = new CommandUpdateVerifica();
                break;
            case FIND_VERIFICA:
                $command = new CommandFindVerifica();
                break;
            case COMPARACION:
                $command = new CommandComparacion();
                break;
        }
        return $command;
    }
}
