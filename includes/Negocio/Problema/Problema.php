<?php

namespace es\ucm;

class Problema
{
    private $IdProblema;
    private $Creditos;
    private $Presencial;
    private $IdAsignatura;

    public function __construct($IdProblema, $Creditos, $Presencial, $IdAsignatura)
    {
        $this->IdProblema = $IdProblema;
        $this->Creditos = $Creditos;
        $this->Presencial = $Presencial;
        $this->IdAsignatura = $IdAsignatura;
    }

    /**
     * @return mixed
     */
    public function getIdProblema()
    {
        return $this->IdProblema;
    }

    /**
     * @param mixed $IdProblema
     *
     * @return self
     */
    public function setIdProblema($IdProblema)
    {
        $this->IdProblema = $IdProblema;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreditos()
    {
        return $this->Creditos;
    }

    /**
     * @param mixed $Creditos
     *
     * @return self
     */
    public function setCreditos($Creditos)
    {
        $this->Creditos = $Creditos;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPresencial()
    {
        return $this->Presencial;
    }

    /**
     * @param mixed $Presencial
     *
     * @return self
     */
    public function setPresencial($Presencial)
    {
        $this->Presencial = $Presencial;

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
