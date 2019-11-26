<?php
namespace es\ucm;

class Metodologia{
    
	private $IdMetodologia;
	private $Metodologia;
	private $MetodologiaI;
	private $IdAsignatura;

	public function __construct($IdMetodologia,$Metodologia,$MetodologiaI,$IdAsignatura){
		$this->IdMetodologia = $IdMetodologia;
		$this->Metodologia = $Metodologia;
		$this->MetodologiaI = $MetodologiaI;
		$this->IdAsignatura = $IdAsignatura;
	}

    /**
     * @return mixed
     */
    public function getIdMetodologia()
    {
    	return $this->IdMetodologia;
    }

    /**
     * @param mixed $IdMetodologia
     *
     * @return self
     */
    public function setIdMetodologia($IdMetodologia)
    {
    	$this->IdMetodologia = $IdMetodologia;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getMetodologia()
    {
    	return $this->Metodologia;
    }

    /**
     * @param mixed $Metodologia
     *
     * @return self
     */
    public function setMetodologia($Metodologia)
    {
    	$this->Metodologia = $Metodologia;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getMetodologiaI()
    {
    	return $this->MetodologiaI;
    }

    /**
     * @param mixed $MetodologiaI
     *
     * @return self
     */
    public function setMetodologiaI($MetodologiaI)
    {
    	$this->MetodologiaI = $MetodologiaI;

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