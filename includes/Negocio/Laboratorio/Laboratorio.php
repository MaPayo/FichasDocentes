<?php
namespace es\ucm;

class Laboratorio{
	private $IdLaboratorio;
	private $Creditos;
	private $Presencial;
	private $IdAsignatura;

	public function __construct($IdLaboratorio,$Creditos,$Presencial,$IdAsignatura){
		$this->IdLaboratorio = $IdLaboratorio;
		$this->Creditos = $Creditos;
		$this->Presencial = $Presencial;
		$this->IdAsignatura = $IdAsignatura;
	}

    /**
     * @return mixed
     */
    public function getIdLaboratorio()
    {
    	return $this->IdLaboratorio;
    }

    /**
     * @param mixed $IdLaboratorio
     *
     * @return self
     */
    public function setIdLaboratorio($IdLaboratorio)
    {
    	$this->IdLaboratorio = $IdLaboratorio;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getCreditos()
    {
    	return $this->Creditos;
    }

    /**
     * @param mixed $Creditos
     *
     * @return self
     */
    public function setCreditos($Creditos)
    {
    	$this->Creditos = $Creditos;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getPresencial()
    {
    	return $this->Presencial;
    }

    /**
     * @param mixed $Presencial
     *
     * @return self
     */
    public function setPresencial($Presencial)
    {
    	$this->Presencial = $Presencial;

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