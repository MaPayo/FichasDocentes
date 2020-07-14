<?php

namespace es\ucm;

class GrupoLaboratorioProfesor
{
    private $IdGrupoLab;
    private $Sesiones;
    private $Fechas;
    private $Horas;
    private $EmailProfesor;
    
    public function __construct($IdGrupoLaboratorio, $Sesiones, $Fechas, $Horas, $EmailProfesor)
    {
        $this->IdGrupoLab = $IdGrupoLaboratorio;
        $this->Sesiones = $Sesiones;
        $this->Fechas = $Fechas;
        $this->Horas = $Horas;
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
    public function getSesiones()
    {
        return $this->Sesiones;
    }

    /**
     * @param mixed $Sesiones
     *
     * @return self
     */
    public function setSesiones($Sesiones)
    {
        $this->Sesiones = $Sesiones;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechas()
    {
        return $this->Fechas;
    }

    /**
     * @param mixed $Fechas
     *
     * @return self
     */
    public function setFechas($Fechas)
    {
        $this->Fechas = $Fechas;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoras()
    {
        return $this->Horas;
    }

    /**
     * @param mixed $Horas
     *
     * @return self
     */
    public function setHoras($Horas)
    {
        $this->Horas = $Horas;

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
