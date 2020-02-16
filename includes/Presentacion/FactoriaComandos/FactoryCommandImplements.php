<?php

namespace es\ucm;

require_once('includes/Presentacion/FactoriaComandos/FactoryCommand.php');
require_once('includes/Presentacion/FactoriaComandos/Administrador/CommandFindAdministrador.php');
require_once('includes/Presentacion/FactoriaComandos/Asignatura/CommandFindAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/Bibliografia/CommandFindBibliografia.php');
require_once('includes/Presentacion/FactoriaComandos/CompetenciasAsignatura/CommandFindCompetenciasAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/Configuracion/CommandFindConfiguracion.php');
require_once('includes/Presentacion/FactoriaComandos/Evaluacion/CommandFindEvaluacion.php');
require_once('includes/Presentacion/FactoriaComandos/Grado/CommandFindGrado.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoClase/CommandFindGrupoClase.php');
require_once('includes/Presentacion/FactoriaComandos/GrupoLaboratorio/CommandFindGrupoLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioClase/CommandFindHorarioClase.php');
require_once('includes/Presentacion/FactoriaComandos/HorarioLaboratorio/CommandFindHorarioLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/Laboratorio/CommandFindLaboratorio.php');
require_once('includes/Presentacion/FactoriaComandos/Leyenda/CommandFindLeyenda.php');
require_once('includes/Presentacion/FactoriaComandos/Metodologia/CommandFindMetodologia.php');
require_once('includes/Presentacion/FactoriaComandos/Permisos/CommandFindPermisos.php');
require_once('includes/Presentacion/FactoriaComandos/Problema/CommandFindProblema.php');
require_once('includes/Presentacion/FactoriaComandos/Profesor/CommandFindProfesor.php');
require_once('includes/Presentacion/FactoriaComandos/ProgramaAsignatura/CommandFindProgramaAsignatura.php');
require_once('includes/Presentacion/FactoriaComandos/Teorico/CommandFindTeorico.php');
require_once('includes/Presentacion/FactoriaComandos/Usuario/CommandFindUsuario.php');
require_once('includes/Presentacion/FactoriaComandos/Verifica/CommandFindVerifica.php');

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
            case CREATE_MODASIGNATURA:
                $command = new CommandCreateModAsignatura();
                break;
            case DELETE_MODASIGNATURA:
                $command = new CommandDeleteModAsignatura();
                break;
           /* case UPDATE_MODASIGNATURA:
                $command = new CommandUpdateModAsignatura();
                break;
            case FIND_MODASIGNATURA:
                $command = new CommandFindModAsignatura();
                break;*/
            case CREATE_BIBLIOGRAFIA:
                $command = new CommandCreateBibliografia();
                break;
            /*case DELETE_BIBLIOGRAFIA:
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
                break;*/
            case CREATE_LABORATORIO:
                $command = new CommandCreateLaboratorio();
                break;
            case DELETE_LABORATORIO:
                $command = new CommandDeleteLaboratorio();
                break;
            /*case UPDATE_LABORATORIO:
                $command = new CommandUpdateLaboratorio();
                break;*/
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
            case CREATE_PERMISOS:
                $command = new CommandCreatePermisos();
                break;
            case DELETE_PERMISOS:
                $command = new CommandDeletePermisos();
                break;
            case UPDATE_PERMISOS:
                $command = new CommandUpdatePermisos();
                break;
            case FIND_PERMISOS:
                $command = new CommandFindPermisos();
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
            }
        return $command;
   }
}
