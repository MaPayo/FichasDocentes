<?php

namespace es\ucm;

class Examenes
{
    private $IdExamenes;
    private $Parcial;
    private $Laboratorio;
    private $Final;
    private $Extraordinario;
    private $IdAsignatura;

    public function __construct($IdExamenes, $Parcial, $Laboratorio, $Final, $Extraordinario, $IdAsignatura)
    {
        $this->IdExamenes = $IdExamenes;
        $this->Parcial = $Parcial;
        $this->Laboratorio = $Laboratorio;
        $this->Final = $Final;
        $this->Extraordinario = $Extraordinario;
        $this->IdAsignatura = $IdAsignatura;
    }

    /**
     * @return mixed
     */
    public function getIdExamenes()
    {
        return $this->IdExamenes;
    }

    /**
     * @param mixed $IdExamenes
     *
     * @return self
     */
    public function setIdExamenes($IdExamenes)
    {
        $this->IdExamenes = $IdExamenes;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getParcial()
    {
        return $this->Parcial;
    }

    /**
     * @param mixed $Parcial
     *
     * @return self
     */
    public function setParcial($Parcial)
    {
        $this->Parcial = $Parcial;

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
    public function getFinal()
    {
        return $this->Final;
    }

    /**
     * @param mixed $Final
     *
     * @return self
     */
    public function setFinal($Final)
    {
        $this->Final = $Final;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExtraordinario()
    {
        return $this->Extraordinario;
    }

    /**
     * @param mixed $Extraordinario
     *
     * @return self
     */
    public function setExtraordinario($Extraordinario)
    {
        $this->Extraordinario = $Extraordinario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdAsignatura()
    {
        return $this->IdAsignatura;
    }

    /**
     * @param mixed $IdAsignatura
     *
     * @return self
     */
    public function setIdAsignatura($IdAsignatura)
    {
        $this->IdAsignatura = $IdAsignatura;

        return $this;
    }
}
