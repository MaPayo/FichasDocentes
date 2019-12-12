<?php
namespace es\ucm;

class ModGrupoClase{
	private $IdGrupoClase;
	private $Letra;
	private $Idioma;
	private $IdModAsignatura;

	public function __construct($IdGrupoClase,$Letra,$Idioma,$IdModAsignatura){
		$this->IdGrupoClase = $IdGrupoClase;
		$this->Letra = $Letra;
		$this->Idioma = $Idioma;
		$this->IdModAsignatura;
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
    public function getIdModAsignatura()
    {
    	return $this->IdModAsignatura;
    }

    /**
     * @param mixed $IdModAsignatura
     *
     * @return self
     */
    public function setIdModAsignatura($IdModAsignatura)
    {
    	$this->IdModAsignatura = $IdModAsignatura;

    	return $this;
    }
}