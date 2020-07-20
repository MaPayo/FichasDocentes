<?php

namespace es\ucm;

class Modulo
{
    private $idModulo;
    private $nombreModulo;
    private $creditosModulo;
    private $codigoGrado;

    public function __construct($IdModulo, $NombreModulo, $CreditosModulo, $CodigoGrado)
    {
        $this->idModulo = $IdModulo;
        $this->nombreModulo = $NombreModulo;
        $this->creditosModulo = $CreditosModulo;
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
    public function getCreditosModulo()
    {
        return $this->creditosModulo;
    }

    /**
     * @param mixed $creditosModulo
     *
     * @return self
     */
    public function setCreditosModulo($CreditosModulo)
    {
        $this->creditosModulo = $CreditosModulo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoGrado()
    {
        return $this->codigoGrado;
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
