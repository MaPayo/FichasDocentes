<?php
namespace es\ucm;

class Verifica{
	private $IdVerifica;
	private $MaximoExamenes;
	private $MinimoExamenes;
	private $MaximoActividades;
	private $MinimoActividades;
	private $MaximoLaboratorio;
	private $MinimoLaboratorio;
	private $IdAsignatura;

	public function __construct($IdVerifica,$MaximoExamenes,$MinimoExamenes,$MaximoActividades,$MinimoActividades,$MaximoLaboratorio,$MinimoLaboratorio,$IdAsignatura){
		$this->IdVerifica = $IdVerifica;
		$this->MaximoExamenes = $MaximoExamenes;
		$this->MinimoExamenes = $MinimoExamenes;
		$this->MaximoActividades = $MaximoActividades;
		$this->MinimoActividades = $MinimoActividades;
		$this->MaximoLaboratorio = $MaximoLaboratorio;
		$this->MinimoLaboratorio = $MinimoLaboratorio;
		$this->IdAsignatura = $IdAsignatura;
	}

    /**
     * @return mixed
     */
    public function getIdVerifica()
    {
    	return $this->IdVerifica;
    }

    /**
     * @param mixed $IdVerifica
     *
     * @return self
     */
    public function setIdVerifica($IdVerifica)
    {
    	$this->IdVerifica = $IdVerifica;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getMaximoExamenes()
    {
    	return $this->MaximoExamenes;
    }

    /**
     * @param mixed $MaximoExamenes
     *
     * @return self
     */
    public function setMaximoExamenes($MaximoExamenes)
    {
    	$this->MaximoExamenes = $MaximoExamenes;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getMinimoExamenes()
    {
    	return $this->MinimoExamenes;
    }

    /**
     * @param mixed $MinimoExamenes
     *
     * @return self
     */
    public function setMinimoExamenes($MinimoExamenes)
    {
    	$this->MinimoExamenes = $MinimoExamenes;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getMaximoActividades()
    {
    	return $this->MaximoActividades;
    }

    /**
     * @param mixed $MaximoActividades
     *
     * @return self
     */
    public function setMaximoActividades($MaximoActividades)
    {
    	$this->MaximoActividades = $MaximoActividades;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getMinimoActividades()
    {
    	return $this->MinimoActividades;
    }

    /**
     * @param mixed $MinimoActividades
     *
     * @return self
     */
    public function setMinimoActividades($MinimoActividades)
    {
    	$this->MinimoActividades = $MinimoActividades;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getMaximoLaboratorio()
    {
    	return $this->MaximoLaboratorio;
    }

    /**
     * @param mixed $MaximoLaboratorio
     *
     * @return self
     */
    public function setMaximoLaboratorio($MaximoLaboratorio)
    {
    	$this->MaximoLaboratorio = $MaximoLaboratorio;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getMinimoLaboratorio()
    {
    	return $this->MinimoLaboratorio;
    }

    /**
     * @param mixed $MinimoLaboratorio
     *
     * @return self
     */
    public function setMinimoLaboratorio($MinimoLaboratorio)
    {
    	$this->MinimoLaboratorio = $MinimoLaboratorio;

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