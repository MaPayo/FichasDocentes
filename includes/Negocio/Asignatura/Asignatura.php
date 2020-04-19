<?php
namespace es\ucm;

class Asignatura {

    private $IdAsignatura;
    private $NombreAsignatura;
    private $Curso;
    private $Semestre;
    private $NombreAsignaturaIngles;
    private $Creditos;
    private $Coordinadores;
    private $IdMateria;

    public function __construct($IdAsignatura,$NombreAsignatura,$Curso,$Semestre,$NombreAsignaturaIngles,$Creditos,$Coordinadores,$IdMateria)
    {
        $this->IdAsignatura = $IdAsignatura;
        $this->NombreAsignatura = $NombreAsignatura;
        $this->Curso = $Curso;
        $this->Semestre = $Semestre;
        $this->NombreAsignaturaIngles = $NombreAsignaturaIngles;
        $this->Creditos = $Creditos;
        $this->Coordinadores = $Coordinadores;
        $this->IdMateria = $IdMateria;
    }

    public function getIdAsignatura(){
        return $this->IdAsignatura;
    }

    public function getNombreAsignatura(){
        return $this->NombreAsignatura;
    }

    public function getCurso(){
        return $this->Curso;
    }

    public function getSemestre(){
        return $this->Semestre;
    }

    public function getNombreAsignaturaIngles(){
        return $this->NombreAsignaturaIngles;
    }

    public  function getCreditos(){
        return $this->Creditos;
    }

    public function getCoordinadores(){
        return $this->Coordinadores;
    }

    public function getIdMateria(){
        return $this->IdMateria;
    }

    public function setIdAsignatura($IdAsignatura){
        $this->IdAsignatura=$IdAsignatura;
    }

    public function setNombreAsignatura($NombreAsignatura){
        $this->NombreAsignatura=$NombreAsignatura;
    }

    public function setCurso($Curso){
        $this->Curso=$Curso;
    }

    public function setSemestre($Semestre){
        $this->Semestre=$Semestre;
    }

    public function setNombreAsignaturaIngles($NombreAsignaturaIngles){
        $this->NombreAsignaturaIngles=$NombreAsignaturaIngles;
    }

    public function setCreditos($Creditos){
        $this->Creditos=$Creditos;
    }

    public function setCoordinadores($Coordinadores){
        $this->Coordinadores=$Coordinadores;
    }

    public function setIdMateria($IdMateria){
        $this->IdMateria=$IdMateria;
    }
}

