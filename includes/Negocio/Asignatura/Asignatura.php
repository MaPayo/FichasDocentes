<?php
namespace es\ucm;

class Asignatura {

    private $IdAsignatura;
    private $NombreAsignatura;
    private $Materia;
    private $Modulo;
    private $Caracter;
    private $Curso;
    private $Semestre;
    private $NombreAsignaturaIngles;
    private $CreditosMateria;
    private $Creditos;
    private $Coordinadores;
    private $CodigoGrado;

    public function __construct($IdAsignatura,$NombreAsignatura,$Materia,$Modulo,$Caracter,$Curso,$Semestre,$NombreAsignaturaIngles,$CreditosMateria,$Creditos,$Coordinadores,$CodigoGrado)
    {
        $this->IdAsignatura = $IdAsignatura;
        $this->NombreAsignatura = $NombreAsignatura;
        $this->Materia = $Materia;
        $this->Modulo = $Modulo;
        $this->Caracter = $Caracter;
        $this->Curso = $Curso;
        $this->Semestre = $Semestre;
        $this->NombreAsignaturaIngles = $NombreAsignaturaIngles;
        $this->CreditosMateria = $CreditosMateria;
        $this->Creditos = $Creditos;
        $this->Coordinadores = $Coordinadores;
        $this->CodigoGrado = $CodigoGrado;
    }

    public function getIdAsignatura(){
        return $this->IdAsignatura;
    }

    public function getNombreAsignatura(){
        return $this->NombreAsignatura;
    }

    public function getMateria(){
        return $this->Materia;
    }

    public function getModulo(){
        return $this->Modulo;
    }

    public function getCaracter(){
        return $this->Caracter;
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

    public function  getCreditosMateria(){
        return $this->CreditosMateria;
    }

    public  function getCreditos(){
        return $this->Creditos;
    }

    public function getCoordinadores(){
        return $this->Coordinadores;
    }

    public function getCodigoGrado(){
        return $this->CodigoGrado;
    }

    public function setIdAsignatura($IdAsignatura){
        $this->IdAsignatura=$IdAsignatura;
    }

    public function setNombreAsignatura($NombreAsignatura){
        $this->NombreAsignatura=$NombreAsignatura;
    }

    public function setMateria($Materia){
        $this->Materia=$Materia;
    }

    public function setModulo($Modulo){
        $this->Modulo=$Modulo;
    }

    public function setCaracter($Caracter){
        $this->Caracter=$Caracter;
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

    public function setCreditosMateria($CreditosMateria){
        $this->CreditosMateria=$CreditosMateria;
    }

    public function setCreditos($Creditos){
        $this->Creditos$Creditos;
    }

    public function setCoordinadores($Coordinadores){
        $this->Coordinadores=$Coordinadores;
    }

    public function setCodigoGrado($CodigoGrado){
        $this->CodigoGrado=$CodigoGrado;
    }
}

