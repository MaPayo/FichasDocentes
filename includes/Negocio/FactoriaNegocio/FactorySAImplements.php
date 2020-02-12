<?php
namespace es\ucm;
require_once('includes/Negocio/FactoriaNegocio/FactorySA.php');
require_once('includes/Negocio/Usuario/SAUsuarioImplements.php');

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

    public function createSABibliogafia(){
        return new SABibliografiaImplements();
    }

    public function createSAModBibliogafia(){
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
