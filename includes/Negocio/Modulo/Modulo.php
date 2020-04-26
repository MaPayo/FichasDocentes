<?php

namespace es\ucm;

class Modulo
{
    private $idModulo;
    private $nombreModulo;
    private $caracter;
    private $codigoGrado;
    public function __construct($IdModulo, $NombreModulo,$Caracter,$CodigoGrado)
    {
        $this->idModulo = $IdModulo;
        $this->nombreModulo = $NombreModulo;
        $this->caracter = $Caracter;
        $this->codigoGrado = $CodigoGrado;
    }


    /**
     * @return mixed
     */
    public function getIdModulo()
    {
        return $this->idModulo;
    }

    /**
     * @param mixed $idModulo
     *
     * @return self
     */
    public function setIdModulo($IdModulo)
    {
        $this->idModulo = $IdModulo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombreModulo()
    {
        return $this->nombreModulo;
    }

    /**
     * @param mixed $NombreModulo
     *
     * @return self
     */
    public function setNombreModulo($NombreModulo)
    {
        $this->nombreModulo = $NombreModulo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCaracter()
    {
        return $this->caracter;
    }

    /**
     * @param mixed $caracter
     *
     * @return self
     */
    public function setCaracter($Caracter)
    {
        $this->caracter = $Caracter;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoGrado()
    {
        return $this->idCodigoGrado;
    }

    /**
     * @param mixed $CodigoGrado
     *
     * @return self
     */
    public function setCodigoGrado($CodigoGrado)
    {
        $this->codigoGrado = $CodigoGrado;

        return $this;
    }
}
