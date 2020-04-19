<?php
namespace es\ucm;

class GrupoLaboratorio{
	private $IdGrupoLab;
	private $Letra;
	private $Idioma;
    private $IdAsignatura;

	public function __construct($IdGrupoLab,$Letra,$Idioma,$IdAsignatura){
		$this->IdGrupoLab = $IdGrupoLab;
		$this->Letra = $Letra;
		$this->Idioma = $Idioma;
        $this->IdAsignatura = $IdAsignatura;
	}

    /**
     * @return mixed
     */
    public function getIdGrupoLab()
    {
    	return $this->IdGrupoLab;
    }

    /**
     * @param mixed $IdGrupoLab
     *
     * @return self
     */
    public function setIdGrupoLab($IdGrupoLab)
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
    public function getIdAsignatura()
    {
    	return $this->IdAsignatura;
    }

    /**
     * @param mixed $IdAsignatura
     *
     * @return self
     */
    public function setIdAsignatura($IdAsignatura)
    {
    	$this->IdAsignatura = $IdAsignatura;

    	return $this;
    }
}