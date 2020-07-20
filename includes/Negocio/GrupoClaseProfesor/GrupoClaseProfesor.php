<?php

namespace es\ucm;

class GrupoClaseProfesor
{
    private $IdGrupoClase;
    private $Tipo;
    private $FechaInicio;
    private $FechaFin;
    private $EmailProfesor;

    public function __construct($IdGrupoClase, $Tipo, $FechaInicio, $FechaFin, $EmailProfesor)
    {
        $this->IdGrupoClase = $IdGrupoClase;
        $this->Tipo = $Tipo;
        $this->FechaInicio = $FechaInicio;
        $this->FechaFin = $FechaFin;
        $this->EmailProfesor = $EmailProfesor;
    }

    /**
     * @return mixed
     */
    public function getIdGrupoClase()
    {
        return $this->IdGrupoClase;
    }

    /**
     * @param mixed $IdGrupoClase
     *
     * @return self
     */
    public function setIdGrupoClase($IdGrupoClase)
    {
        $this->IdGrupoClase = $IdGrupoClase;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->Tipo;
    }

    /**
     * @param mixed $Tipo
     *
     * @return self
     */
    public function setTipo($Tipo)
    {
        $this->Tipo = $Tipo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->FechaInicio;
    }

    /**
     * @param mixed $FechaInicio
     *
     * @return self
     */
    public function setFechaInicio($FechaInicio)
    {
        $this->FechaInicio = $FechaInicio;

        return $this;
    }

/**
     * @return mixed
     */
    public function getFechaFin()
    {
        return $this->FechaFin;
    }

    /**
     * @param mixed $FechaInicio
     *
     * @return self
     */
    public function setFechaFin($FechaFin)
    {
        $this->FechaInicio = $FechaInicio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailProfesor()
    {
        return $this->EmailProfesor;
    }

    /**
     * @param mixed $EmailProfesor
     *
     * @return self
     */
    public function setEmailProfesor($EmailProfesor)
    {
        $this->EmailProfesor = $EmailProfesor;

        return $this;
    }
}
