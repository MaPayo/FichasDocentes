<?php

namespace es\ucm;

class Materia
{
    private $idMateria;
    private $nombreMateria;
    private $caracter;
    private $creditosMateria;
    private $activo;
    private $idModulo;
    public function __construct($IdMateria, $NombreMateria, $Caracter, $CreditosMateria,$activo, $IdModulo)
    {
        $this->idMateria = $IdMateria;
        $this->nombreMateria = $NombreMateria;
        $this->caracter = $Caracter;
        $this->creditosMateria = $CreditosMateria;
        $this->activo = $activo;
        $this->idModulo = $IdModulo;
    }


    /**
     * @return mixed
     */
    public function getIdMateria()
    {
        return $this->idMateria;
    }

    /**
     * @param mixed $idMateria
     *
     * @return self
     */
    public function setIdMateria($IdMateria)
    {
        $this->idMateria = $IdMateria;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombreMateria()
    {
        return $this->nombreMateria;
    }

    /**
     * @param mixed $NombreMateria
     *
     * @return self
     */
    public function setNombreMateria($NombreMateria)
    {
        $this->nombreMateria = $NombreMateria;

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
    public function getCreditosMateria()
    {
        return $this->creditosMateria;
    }

    /**
     * @param mixed $creditosMateria
     *
     * @return self
     */
    public function setCreditosMateria($CreditosMateria)
    {
        $this->creditosMateria = $CreditosMateria;

        return $this;
    }
    public function getActivo()
    {
        return $this->activo;
    }
    public function setActivo($Activo)
    {
        $this->activo = $Activo;
    }
    /**
     * @return mixed
     */
    public function getIdModulo()
    {
        return $this->idModulo;
    }

    /**
     * @param mixed $IdModulo
     *
     * @return self
     */
    public function setIdModulo($IdModulo)
    {
        $this->idModulo = $IdModulo;

        return $this;
    }
}
