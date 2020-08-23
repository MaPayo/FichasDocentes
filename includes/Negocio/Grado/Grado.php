<?php

namespace es\ucm;

class Grado
{
    private $CodigoGrado;
    private $NombreGrado;
    private $CoordinadorGrado;
    private $Activo;
    private $HorasEcts;

    public function __construct($CodigoGrado, $NombreGrado, $CoordinadorGrado, $Activo, $HorasEcts)
    {
        $this->CodigoGrado = $CodigoGrado;
        $this->NombreGrado = $NombreGrado;
        $this->CoordinadorGrado = $CoordinadorGrado;
        $this->Activo = $Activo;
        $this->HorasEcts = $HorasEcts;
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
    }

    /**
     * @return mixed
     */
    public function getCoordinadorGrado()
    {
        return $this->CoordinadorGrado;
    }

    /**
     * @param mixed $CoordinadorGrado
     *
     * @return self
     */
    public function setCoordinadorGrado($CoordinadorGrado)
    {
        $this->CoordinadorGrado = $CoordinadorGrado;
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
    }

    public function getActivo()
    {
        return $this->Activo;
    }
    public function setActivo($Activo)
    {
        $this->Activo = $Activo;
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
    }
}
