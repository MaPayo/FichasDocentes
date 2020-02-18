<?php
namespace es\ucm;

interface FactorySA{
    
    public function createSAAdministrador();
    public function createSAAsignatura();
    public function createSAModAsignatura();
    public function createSABibliografia();
    public function createSAModBibliografia();
    public function createSACompetenciaAsignatura();
    public function createSAModCompetenciaAsignatura();
    public function createSAConfiguracion();
    public function createSAEvaluacion();
    public function createSAModEvaluacion();
    public function createSAGrado();
    public function createSAGrupoClase();
    public function createSAModGrupoClase();
    public function createSAGrupoLaboratorio();
    public function createSAModGrupoLaboratorio();
    public function createSAHorarioClase();
    public function createSAModHorarioClase();
    public function createSAHorarioLaboratorio();
    public function createSAModHorarioLaboratorio();
    public function createSALaboratorio();
    public function createSALeyenda();
    public function createSAMetodologia();
    public function createSAModMetodologia();
    public function createSAPermisos();
    public function createSAProblema();
    public function createSAProfesor();
    public function createSAProgramaAsignatura();
    public function createSAModProgramaAsignatura();
    public function createSATeorico();
    public function createSAUsuario();
    public function createSAVerifica();
}
