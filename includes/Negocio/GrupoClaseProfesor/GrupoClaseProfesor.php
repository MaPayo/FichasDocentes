<?php

namespace es\ucm;

class GrupoClaseProfesor
{
    private $IdGrupoClase;
    private $Tipo;
    private $Fechas;
    private $Horas;
    private $EmailProfesor;

    public function __construct($IdGrupoClase, $Tipo, $Fechas, $Horas, $EmailProfesor)
    {
        $this->IdGrupoClase = $IdGrupoClase;
        $this->Tipo = $Tipo;
        $this->Fechas = $Fechas;
        $this->Horas = $Horas;
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
