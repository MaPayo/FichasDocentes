<?php
namespace es\ucm;

class FactorySAImplements implements FactorySA{

    public static function createSAAdministrador(){
        return new SAAdministrador();
    }
    
    public static function createSAAsignatura(){
        return new SAAsignaturaImplements();
    }

    public static function createSABibliogafia(){
        return new SABibliografia();
    }

    public static function createSACompetenciaAsignatura(){
        return new SACompetenciaAsignatura();
    }

    public static function createSAConfiguracion(){
        return new SAConfiguracion();
    }

    public static function createSAEvaluacion(){
        return new SAEvaluacion();
    }

    public static function createSAGrado(){
        return new SAGrado();
    }

    public static function createSAGrupoClase(){
        return new SAGrupoClase();
    }

    public static function createSAGrupoLaboratorio(){
        return new SAGrupoLaboratorio();
    }

    public static function createSAHorarioClase(){
        return new SAHorarioClase();
    }

    public static function createSAHorarioLaboratorio(){
        return new SAHorarioLaboratorio();
    }

    public static function createSALaboratorio(){
        return new SALaboratorio();
    }

    public static function createSALeyenda(){
        return new SALeyenda();
    }

    public static function createSAMetodologia(){
        return new SAMetodologia();
    }

    public static function createSAModAsignatura(){
        return new SAModAsignatura();
    }

    public static function createSAPermiso(){
        return new SAPermiso();
    }

    public static function createSAProblema(){
        return new SAProblema();
    }

    public static function createSAProfesor(){
        return new SAProfesor();
    }

    public static function createSAProgramaAsignatura(){
        return new SAProgramaAsignatura();
    }

    public static function createSATeorico(){
        return new SATeorico();
    }

    public static function createSAUsuario(){
        return new SAUsuario();
    }

    public static function createSAVerifica(){
        return new SAVerifica();
    }

}
