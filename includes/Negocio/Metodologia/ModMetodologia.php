<?php

namespace es\ucm;

class ModMetodologia
{
    private $IdMetodologia;
    private $Metodologia;
    private $MetodologiaI;
    private $IdModAsignatura;

    public function __construct($IdMetodologia, $Metodologia, $MetodologiaI, $IdModAsignatura)
    {
        $this->IdMetodologia = $IdMetodologia;
        $this->Metodologia = $Metodologia;
        $this->MetodologiaI = $MetodologiaI;
        $this->IdModAsignatura = $IdModAsignatura;
    }

    /**
     * @return mixed
     */
    public function getIdMetodologia()
    {
        return $this->IdMetodologia;
    }

    /**
     * @param mixed $IdMetodologia
     *
     * @return self
     */
    public function setIdMetodologia($IdMetodologia)
    {
        $this->IdMetodologia = $IdMetodologia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetodologia()
    {
        return $this->Metodologia;
    }

    /**
     * @param mixed $Metodologia
     *
     * @return self
     */
    public function setMetodologia($Metodologia)
    {
        $this->Metodologia = $Metodologia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetodologiaI()
    {
        return $this->MetodologiaI;
    }

    /**
     * @param mixed $MetodologiaI
     *
     * @return self
     */
    public function setMetodologiaI($MetodologiaI)
    {
        $this->MetodologiaI = $MetodologiaI;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdAsignatura()
    {
        return $this->IdModAsignatura;
    }

    /**
     * @param mixed $IdModAsignatura
     *
     * @return self
     */
    public function setIdAsignatura($IdModAsignatura)
    {
        $this->IdModAsignatura = $IdModAsignatura;

        return $this;
    }
}
