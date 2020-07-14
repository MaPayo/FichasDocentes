<?php

namespace es\ucm;

class ModHorarioLaboratorio
{
    private $IdHorarioLab;
    private $Laboratorio;
    private $Dia;
    private $HoraInicio;
    private $HoraFin;
    private $IdGrupoLab;

    public function __construct($IdHorarioLab, $Laboratorio, $Dia, $HoraInicio, $HoraFin, $IdGrupoLab)
    {
        $this->IdHorarioLab = $IdHorarioLab;
        $this->Laboratorio = $Laboratorio;
        $this->Dia = $Dia;
        $this->HoraInicio = $HoraInicio;
        $this->HoraFin = $HoraFin;
        $this->IdGrupoLab = $IdGrupoLab;
    }

    /**
     * @return mixed
     */
    public function getIdHorarioLab()
    {
        return $this->IdHorarioLab;
    }

    /**
     * @param mixed $IdHorarioLab
     *
     * @return self
     */
    public function setIdHorarioLab($IdHorarioLab)
    {
        $this->IdHorarioLab = $IdHorarioLab;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLaboratorio()
    {
        return $this->Laboratorio;
    }

    /**
     * @param mixed $Laboratorio
     *
     * @return self
     */
    public function setLaboratorio($Laboratorio)
    {
        $this->Laboratorio = $Laboratorio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDia()
    {
        return $this->Dia;
    }

    /**
     * @param mixed $Dia
     *
     * @return self
     */
    public function setDia($Dia)
    {
        $this->Dia = $Dia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoraInicio()
    {
        return $this->HoraInicio;
    }

    /**
     * @param mixed $HoraInicio
     *
     * @return self
     */
    public function setHoraInicio($HoraInicio)
    {
        $this->HoraInicio = $HoraInicio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoraFin()
    {
        return $this->HoraFin;
    }

    /**
     * @param mixed $HoraFin
     *
     * @return self
     */
    public function setHoraFin($HoraFin)
    {
        $this->HoraFin = $HoraFin;

        return $this;
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
    public function setIdGrupoLab($IdGrupoLab)
    {
        $this->IdGrupoLab = $IdGrupoLab;

        return $this;
    }
}
