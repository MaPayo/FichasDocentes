<?php

namespace es\ucm;

class Teorico
{
    private $IdTeorico;
    private $Creditos;
    private $Presencial;
    private $IdAsignatura;

    public function __construct($IdTeorico, $Creditos, $Presencial, $IdAsignatura)
    {
        $this->IdTeorico = $IdTeorico;
        $this->Creditos = $Creditos;
        $this->Presencial = $Presencial;
        $this->IdAsignatura = $IdAsignatura;
    }

    /**
     * @return mixed
     */
    public function getIdTeorico()
    {
        return $this->IdTeorico;
    }

    /**
     * @param mixed $IdTeorico
     *
     * @return self
     */
    public function setIdTeorico($IdTeorico)
    {
        $this->IdTeorico = $IdTeorico;

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
