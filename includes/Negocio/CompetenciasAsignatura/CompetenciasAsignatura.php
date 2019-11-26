<?php
namespace es\ucm;

class CompetenciaAsignatura{
    
	private $IdComepetencia;
	private $Generales;
	private $GeneralesI;
	private $Especificas;
	private $EspecificasI;
	private $BasicasYTransversales;
	private $BasicasYTransversalesI;
	private $ResultadosAprendizaje;
	private $ResultadosAprendizajeI;
	private $IdAsignatura;

	public function __construct($IdComepetencia,$Generales, $GeneralesI,$Especificas,$EspecificasI,$BasicasYTransversales,$BasicasYTransversalesI,$ResultadosAprendizaje,$ResultadosAprendizajeI,$IdAsignatura){
		$this->IdComepetencia = $IdComepetencia;
		$this->Generales = $Generales;
		$this->GeneralesI = $GeneralesI;
		$this->Especificas = $Especificas;
		$this->EspecificasI = $EspecificasI;
		$this->BasicasYTransversales = $BasicasYTransversales;
		$this->BasicasYTransversalesI = $BasicasYTransversalesI;
		$this->ResultadosAprendizaje = $ResultadosAprendizaje;
		$this->ResultadosAprendizajeI = $ResultadosAprendizajeI;
		$this->IdAsignatura = $IdAsignatura;

	}

    /**
     * @return mixed
     */
    public function getIdComepetencia()
    {
    	return $this->IdComepetencia;
    }

    /**
     * @param mixed $IdComepetencia
     *
     * @return self
     */
    public function setIdComepetencia($IdComepetencia)
    {
    	$this->IdComepetencia = $IdComepetencia;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getGenerales()
    {
    	return $this->Generales;
    }

    /**
     * @param mixed $Generales
     *
     * @return self
     */
    public function setGenerales($Generales)
    {
    	$this->Generales = $Generales;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getGeneralesI()
    {
    	return $this->GeneralesI;
    }

    /**
     * @param mixed $GeneralesI
     *
     * @return self
     */
    public function setGeneralesI($GeneralesI)
    {
    	$this->GeneralesI = $GeneralesI;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getEspecificas()
    {
    	return $this->Especificas;
    }

    /**
     * @param mixed $Especificas
     *
     * @return self
     */
    public function setEspecificas($Especificas)
    {
    	$this->Especificas = $Especificas;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getEspecificasI()
    {
    	return $this->EspecificasI;
    }

    /**
     * @param mixed $EspecificasI
     *
     * @return self
     */
    public function setEspecificasI($EspecificasI)
    {
    	$this->EspecificasI = $EspecificasI;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getBasicasYTransversales()
    {
    	return $this->BasicasYTransversales;
    }

    /**
     * @param mixed $BasicasYTransversales
     *
     * @return self
     */
    public function setBasicasYTransversales($BasicasYTransversales)
    {
    	$this->BasicasYTransversales = $BasicasYTransversales;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getBasicasYTransversalesI()
    {
    	return $this->BasicasYTransversalesI;
    }

    /**
     * @param mixed $BasicasYTransversalesI
     *
     * @return self
     */
    public function setBasicasYTransversalesI($BasicasYTransversalesI)
    {
    	$this->BasicasYTransversalesI = $BasicasYTransversalesI;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getResultadosAprendizaje()
    {
    	return $this->ResultadosAprendizaje;
    }

    /**
     * @param mixed $ResultadosAprendizaje
     *
     * @return self
     */
    public function setResultadosAprendizaje($ResultadosAprendizaje)
    {
    	$this->ResultadosAprendizaje = $ResultadosAprendizaje;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getResultadosAprendizajeI()
    {
    	return $this->ResultadosAprendizajeI;
    }

    /**
     * @param mixed $ResultadosAprendizajeI
     *
     * @return self
     */
    public function setResultadosAprendizajeI($ResultadosAprendizajeI)
    {
    	$this->ResultadosAprendizajeI = $ResultadosAprendizajeI;

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