<?php

namespace es\ucm;

class GrupoClase
{
    private $IdGrupoClase;
    private $Letra;
    private $Idioma;
    private $IdAsignatura;

    public function __construct($IdGrupoClase, $Letra, $Idioma, $IdAsignatura)
    {
        $this->IdGrupoClase = $IdGrupoClase;
        $this->Letra = $Letra;
        $this->Idioma = $Idioma;
        $this->IdAsignatura = $IdAsignatura;
    }

    /**
     * @param mixed $IdAsignatura
     *
     * @return self
     */
    public function setIdAsignatura($IdAsignatura)
    {
        $this->IdAsignatura = $IdAsignatura;
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
    public function getLetra()
    {
        return $this->Letra;
    }

    /**
     * @param mixed $Letra
     *
     * @return self
     */
    public function setLetra($Letra)
    {
        $this->Letra = $Letra;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdioma()
    {
        return $this->Idioma;
    }

    /**
     * @param mixed $Idioma
     *
     * @return self
     */
    public function setIdioma($Idioma)
    {
        $this->Idioma = $Idioma;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdAsignatura()
    {
        return $this->IdAsignatura;
    }
}
