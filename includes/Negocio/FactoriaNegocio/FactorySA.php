<?php
namespace es\ucm;

abstract class FactorySA{
    
    abstract public function createSAAdministrador();
    abstract public function createSAAsignatura();
    abstract public function createSABibliogafia();
    abstract public function createSACompetenciaAsignatura();
    abstract public function createSAConfiguracion();
    abstract public function createSAEvaluacion();
    abstract public function createSAGrado();
    abstract public function createSAGrupoClase();
    abstract public function createSAGrupoLaboratorio();
    abstract public function createSAHorarioClase();
    abstract public function createSAHorarioLaboratorio();
    abstract public function createSALaboratorio();
    abstract public function createSALeyenda();
    abstract public function createSAMetodologia();
    abstract public function createSAModAsignatura();
    abstract public function createSAPermiso();
    abstract public function createSAProblema();
    abstract public function createSAProfesor();
    abstract public function createSAProgramaAsignatura();
    abstract public function createSATeorico();
    abstract public function createSAUsuario();
    abstract public function createSAVerifica();
}
