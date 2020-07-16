<?php
namespace es\ucm;

class Asignatura {

    private $IdAsignatura;
    private $NombreAsignatura;
    private $Curso;
    private $Semestre;
    private $NombreAsignaturaIngles;
    private $Creditos;
<<<<<<< Updated upstream
    private $Coordinadores;
    private $IdMateria;

    public function __construct($IdAsignatura,$NombreAsignatura,$Curso,$Semestre,$NombreAsignaturaIngles,$Creditos,$Coordinadores,$IdMateria)
=======
    private $CoordinadorAsignatura;
    private $Estado;
    private $IdMateria;

    public function __construct($IdAsignatura, $NombreAsignatura, $Abreviatura, $Curso, $Semestre, $NombreAsignaturaIngles, $Creditos, $CoordinadorAsignatura, $Estado, $IdMateria)
>>>>>>> Stashed changes
    {
        $this->IdAsignatura = $IdAsignatura;
        $this->NombreAsignatura = $NombreAsignatura;
        $this->Curso = $Curso;
        $this->Semestre = $Semestre;
        $this->NombreAsignaturaIngles = $NombreAsignaturaIngles;
        $this->Creditos = $Creditos;
<<<<<<< Updated upstream
        $this->Coordinadores = $Coordinadores;
=======
        $this->CoordinadorAsignatura = $CoordinadorAsignatura;
        $this->Estado = $Estado;
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
    public function getCoordinadores(){
        return $this->Coordinadores;
=======
    public function getCoordinadorAsignatura()
    {
        return $this->CoordinadorAsignatura;
    }

    public function getEstado()
    {
        return $this->Estado;
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
    public function setIdMateria($IdMateria){
        $this->IdMateria=$IdMateria;
=======
    public function setCoordinadorAsignatura($CoordinadorAsignatura)
    {
        $this->CoordinadorAsignatura = $CoordinadorAsignatura;
    }

    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

    public function setIdMateria($IdMateria)
    {
        $this->IdMateria = $IdMateria;
>>>>>>> Stashed changes
    }
}

