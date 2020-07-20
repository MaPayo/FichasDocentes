<?php

namespace es\ucm;

class Asignatura
{

    private $IdAsignatura;
    private $NombreAsignatura;
    private $Abreviatura;
    private $Curso;
    private $Semestre;
    private $NombreAsignaturaIngles;
    private $Creditos;
    private $CoordinadorAsignatura;
    private $Estado;
    private $IdMateria;

    public function __construct($IdAsignatura, $NombreAsignatura, $Abreviatura, $Curso, $Semestre, $NombreAsignaturaIngles, $Creditos, $CoordinadorAsignatura, $Estado, $IdMateria)
    {
        $this->IdAsignatura = $IdAsignatura;
        $this->NombreAsignatura = $NombreAsignatura;
        $this->$Abreviatura = $Abreviatura;
        $this->Curso = $Curso;
        $this->Semestre = $Semestre;
        $this->NombreAsignaturaIngles = $NombreAsignaturaIngles;
        $this->Creditos = $Creditos;
        $this->CoordinadorAsignatura = $CoordinadorAsignatura;
        $this->Estado = $Estado;
        $this->IdMateria = $IdMateria;
    }

    public function getIdAsignatura()
    {
        return $this->IdAsignatura;
    }

    public function getNombreAsignatura()
    {
        return $this->NombreAsignatura;
    }

    public function getAbreviatura()
    {
        return $this->Abreviatura;
    }

    public function getCurso()
    {
        return $this->Curso;
    }

    public function getSemestre()
    {
        return $this->Semestre;
    }

    public function getNombreAsignaturaIngles()
    {
        return $this->NombreAsignaturaIngles;
    }

    public  function getCreditos()
    {
        return $this->Creditos;
    }

    public function getCoordinadorAsignatura()
    {
        return $this->CoordinadorAsignatura;
    }

    public function getEstado()
    {
        return $this->Estado;
    }

    public function getIdMateria()
    {
        return $this->IdMateria;
    }

    public function setIdAsignatura($IdAsignatura)
    {
        $this->IdAsignatura = $IdAsignatura;
    }

    public function setNombreAsignatura($NombreAsignatura)
    {
        $this->NombreAsignatura = $NombreAsignatura;
    }

    public function setAbreviatura($Abreviatura)
    {
        $this->Abreviatura = $Abreviatura;
    }

    public function setCurso($Curso)
    {
        $this->Curso = $Curso;
    }

    public function setSemestre($Semestre)
    {
        $this->Semestre = $Semestre;
    }

    public function setNombreAsignaturaIngles($NombreAsignaturaIngles)
    {
        $this->NombreAsignaturaIngles = $NombreAsignaturaIngles;
    }

    public function setCreditos($Creditos)
    {
        $this->Creditos = $Creditos;
    }

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
    }
}
