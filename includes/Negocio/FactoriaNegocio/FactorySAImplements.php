<?php
namespace es\ucm;

class FactorySAImplements implements FactorySA{

    public static function createSAAdministrador(){
        return new SAAdministradorImplements();
    }
    
    public static function createSAAsignatura(){
        return new SAAsignaturaImplements();
    }

    public static function createSAModAsignatura(){
        return new SAModAsignaturaImplements();
    }

    public static function createSABibliogafia(){
        return new SABibliografiaImplements();
    }

    public static function createSAModBibliogafia(){
        return new SAModBibliografiaImplements();
    }

    public static function createSACompetenciaAsignatura(){
        return new SACompetenciaAsignaturaImplements();
    }

    public static function createSAModCompetenciaAsignatura(){
        return new SAModCompetenciaAsignaturaImplements();
    }

    public static function createSAConfiguracion(){
        return new SAConfiguracionImplements();
    }

    public static function createSAEvaluacion(){
        return new SAEvaluacionImplements();
    }

    public static function createSAModEvaluacion(){
        return new SAModEvaluacionImplements();
    }

    public static function createSAGrado(){
        return new SAGradoImplements();
    }

    public static function createSAGrupoClase(){
        return new SAGrupoClaseImplements();
    }

    public static function createSAModGrupoClase(){
        return new SAModGrupoClaseImplements();
    }


    public static function createSAGrupoLaboratorio(){
        return new SAGrupoLaboratorioImplements();
    }

    public static function createSAModGrupoLaboratorio(){
        return new SAModGrupoLaboratorioImplements();
    }

    public static function createSAHorarioClase(){
        return new SAHorarioClaseImplements();
    }

    public static function createSAModHorarioClase(){
        return new SAModHorarioClaseImplements();
    }

    public static function createSAHorarioLaboratorio(){
        return new SAHorarioLaboratorioImplements();
    }

    public static function createSAModHorarioLaboratorio(){
        return new SAModHorarioLaboratorioImplements();
    }

    public static function createSALaboratorio(){
        return new SALaboratorioImplements();
    }

    public static function createSALeyenda(){
        return new SALeyendaImplements();
    }

    public static function createSAMetodologia(){
        return new SAMetodologiaImplements();
    }

    public static function createSAModMetodologia(){
        return new SAModMetodologiaImplements();
    }

    public static function createSAPermisos(){
        return new SAPermisosImplements();
    }

    public static function createSAProblema(){
        return new SAProblemaImplements();
    }

    public static function createSAProfesor(){
        return new SAProfesorImplements();
    }

    public static function createSAProgramaAsignatura(){
        return new SAProgramaAsignaturaImplements();
    }

    public static function createSAModProgramaAsignatura(){
        return new SAModProgramaAsignaturaImplements();
    }

    public static function createSATeorico(){
        return new SATeoricoImplements();
    }

    public static function createSAUsuario(){
        return new SAUsuarioImplements();
    }

    public static function createSAVerifica(){
        return new SAVerificaImplements();
    }

}
