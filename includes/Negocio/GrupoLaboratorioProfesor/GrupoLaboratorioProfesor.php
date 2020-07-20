<?php

namespace es\ucm;

class GrupoLaboratorioProfesor
{
    private $IdGrupoLab;
    private $FechaInicio;
    private $FechaFin;
    private $EmailProfesor;
    
    public function __construct($IdGrupoLaboratorio, $FechaInicio, $FechaFin,$EmailProfesor)
    {
        $this->IdGrupoLab = $IdGrupoLaboratorio;
        $this->FechaInicio = $FechaInicio;
        $this->FechaFin = $FechaFin;
        $this->EmailProfesor = $EmailProfesor;
    }

    /**
     * @return mixed
     */
    public function getIdGrupoLab()
    {
        return $this->IdGrupoLab;
    }

    /**
     * @param mixed $IdGrupoLab
     *
     * @return self
     */
    public function setIdGrupoLab($IdGrupoLaboratorio)
    {
        $this->IdGrupoLab = $IdGrupoLaboratorio;

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
        $this->FechaFin = $FechaFin;

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
