<?php
namespace es\ucm;
require_once('includes/Negocio/FactoriaNegocio/FactorySA.php');
require_once('includes/Negocio/Administrador/SAAdministradorImplements.php');
require_once('includes/Negocio/Asignatura/SAAsignaturaImplements.php');
require_once('includes/Negocio/Bibliografia/SABibliografiaImplements.php');
require_once('includes/Negocio/CompetenciasAsignatura/SACompetenciaAsignaturaImplements.php');
require_once('includes/Negocio/Configuracion/SAConfiguracionImplements.php');
require_once('includes/Negocio/Evaluacion/SAEvaluacionImplements.php');
require_once('includes/Negocio/Grado/SAGradoImplements.php');
require_once('includes/Negocio/GrupoClase/SAGrupoClaseImplements.php');
require_once('includes/Negocio/GrupoLaboratorio/SAGrupoLaboratorioImplements.php');
require_once('includes/Negocio/HorarioClase/SAHorarioClaseImplements.php');
require_once('includes/Negocio/Laboratorio/SALaboratorioImplements.php');
require_once('includes/Negocio/Leyenda/SALeyendaImplements.php');
require_once('includes/Negocio/Metodologia/SAMetodologiaImplements.php');
require_once('includes/Negocio/Permisos/SAPermisosImplements.php');
require_once('includes/Negocio/Problema/SAProblemaImplements.php');
require_once('includes/Negocio/Profesor/SAProfesorImplements.php');
require_once('includes/Negocio/ProgramaAsignatura/SAProgramaAsignaturaImplements.php');
require_once('includes/Negocio/Teorico/SATeoricoImplements.php');
require_once('includes/Negocio/Usuario/SAUsuarioImplements.php');
require_once('includes/Negocio/Verifica/SAVerificaImplements.php');

class FactorySAImplements implements FactorySA{

    public function createSAAdministrador(){
        return new SAAdministradorImplements();
    }
    
    public function createSAAsignatura(){
        return new SAAsignaturaImplements();
    }

    public function createSAModAsignatura(){
        return new SAModAsignaturaImplements();
    }

    public function createSABibliografia(){
        return new SABibliografiaImplements();
    }

    public function createSAModBibliografia(){
        return new SAModBibliografiaImplements();
    }

    public function createSACompetenciaAsignatura(){
        return new SACompetenciaAsignaturaImplements();
    }

    public function createSAModCompetenciaAsignatura(){
        return new SAModCompetenciaAsignaturaImplements();
    }

    public function createSAConfiguracion(){
        return new SAConfiguracionImplements();
    }

    public function createSAEvaluacion(){
        return new SAEvaluacionImplements();
    }

    public function createSAModEvaluacion(){
        return new SAModEvaluacionImplements();
    }

    public function createSAGrado(){
        return new SAGradoImplements();
    }

    public function createSAGrupoClase(){
        return new SAGrupoClaseImplements();
    }

    public function createSAModGrupoClase(){
        return new SAModGrupoClaseImplements();
    }


    public function createSAGrupoLaboratorio(){
        return new SAGrupoLaboratorioImplements();
    }

    public function createSAModGrupoLaboratorio(){
        return new SAModGrupoLaboratorioImplements();
    }

    public function createSAHorarioClase(){
        return new SAHorarioClaseImplements();
    }

    public function createSAModHorarioClase(){
        return new SAModHorarioClaseImplements();
    }

    public function createSAHorarioLaboratorio(){
        return new SAHorarioLaboratorioImplements();
    }

    public function createSAModHorarioLaboratorio(){
        return new SAModHorarioLaboratorioImplements();
    }

    public function createSALaboratorio(){
        return new SALaboratorioImplements();
    }

    public function createSALeyenda(){
        return new SALeyendaImplements();
    }

    public function createSAMetodologia(){
        return new SAMetodologiaImplements();
    }

    public function createSAModMetodologia(){
        return new SAModMetodologiaImplements();
    }

    public function createSAPermisos(){
        return new SAPermisosImplements();
    }

    public function createSAProblema(){
        return new SAProblemaImplements();
    }

    public function createSAProfesor(){
        return new SAProfesorImplements();
    }

    public function createSAProgramaAsignatura(){
        return new SAProgramaAsignaturaImplements();
    }

    public function createSAModProgramaAsignatura(){
        return new SAModProgramaAsignaturaImplements();
    }

    public function createSATeorico(){
        return new SATeoricoImplements();
    }

    public function createSAUsuario(){
        return new SAUsuarioImplements();
    }

    public function createSAVerifica(){
        return new SAVerificaImplements();
    }

}
