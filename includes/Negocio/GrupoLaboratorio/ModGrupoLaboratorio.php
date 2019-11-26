<?php
namespace es\ucm;

class ModGrupoLaboratorio{
    
	private $IdGrupoLab;
	private $Letra;
	private $Idioma;
	private $IdModAsignatura;

	public function __construct($IdGrupoLab,$Letra,$Idioma,$IdModAsignatura){
		$this->IdGrupoLab = $IdGrupoLab;
		$this->Letra = $Letra;
		$this->Idioma = $Idioma;
		$this->IdModAsignatura = $IdModAsignatura;
	}

    /**
     * @return mixed
     */
    public function getIdGrupoClase()
    {
    	return $this->IdGrupoLab;
    }

    /**
     * @param mixed $IdGrupoLab
     *
     * @return self
     */
    public function setIdGrupoClase($IdGrupoLab)
    {
    	$this->IdGrupoLab = $IdGrupoLab;

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