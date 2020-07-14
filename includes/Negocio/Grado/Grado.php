<?php

namespace es\ucm;

class Grado
{
    private $CodigoGrado;
    private $NombreGrado;
    private $Coordinador;
    private $HorasEcts;
    private $AnyoAcademico;

    public function __construct($CodigoGrado, $NombreGrado, $Coordinador, $HorasEcts, $AnyoAcademico)
    {
        $this->CodigoGrado = $CodigoGrado;
        $this->NombreGrado = $NombreGrado;
        $this->Coordinador = $Coordinador;
        $this->HorasEcts = $HorasEcts;
        $this->AnyoAcademico = $AnyoAcademico;
    }

    /**
     * @return mixed
     */
    public function getNombreGrado()
    {
        return $this->NombreGrado;
    }

    /**
     * @param mixed $NombreGrado
     *
     * @return self
     */
    public function setNombreGrado($NombreGrado)
    {
        $this->NombreGrado = $NombreGrado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCoordinador()
    {
        return $this->Coordinador;
    }

    /**
     * @param mixed $Coordinador
     *
     * @return self
     */
    public function setCoordinador($Coordinador)
    {
        $this->Coordinador = $Coordinador;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHorasEcts()
    {
        return $this->HorasEcts;
    }

    /**
     * @param mixed $HorasEtcs
     *
     * @return self
     */
    public function setHorasEcts($HorasEcts)
    {
        $this->HorasEcts = $HorasEcts;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnyoAcademico()
    {
        return $this->AnyoAcademico;
    }

    /**
     * @param mixed $AnyoAcademico
     *
     * @return self
     */
    public function setAnyoAcademico($AnyoAcademico)
    {
        $this->AnyoAcademico = $AnyoAcademico;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoGrado()
    {
        return $this->CodigoGrado;
    }

    /**
     * @param mixed $CodigoGrado
     *
     * @return self
     */
    public function setCodigoGrado($CodigoGrado)
    {
        $this->CodigoGrado = $CodigoGrado;

        return $this;
    }
}
