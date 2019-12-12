<?php
namespace es\ucm;

class ModProgramaAsignatura{
	private $IdPrograma;
	private $ConocimientosPrevios;
	private $ConocimientosPreviosI;
	private $BreveDescripcion;
	private $BreveDescripcionI;
	private $ProgramaDetallado;
	private $ProgramaDetalladoI;
	private $IdModAsignatura;

	public function __construct(){
		$this->IdPrograma = $IdPrograma;
		$this->ConocimientosPrevios = $ConocimientosPrevios;
		$this->ConocimientosPreviosI = $ConocimientosPreviosI;
		$this->BreveDescripcion = $BreveDescripcion;
		$this->BreveDescripcionI = $BreveDescripcionI;
		$this->ProgramaDetallado = $ProgramaDetallado;
		$this->ProgramaDetalladoI = $ProgramaDetalladoI;
		$this->IdModAsignatura = $IdModAsignatura;
	}

    /**
     * @return mixed
     */
    public function getIdPrograma()
    {
    	return $this->IdPrograma;
    }

    /**
     * @param mixed $IdPrograma
     *
     * @return self
     */
    public function setIdPrograma($IdPrograma)
    {
    	$this->IdPrograma = $IdPrograma;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getConocimientosPrevios()
    {
    	return $this->ConocimientosPrevios;
    }

    /**
     * @param mixed $ConocimientosPrevios
     *
     * @return self
     */
    public function setConocimientosPrevios($ConocimientosPrevios)
    {
    	$this->ConocimientosPrevios = $ConocimientosPrevios;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getConocimientosPreviosI()
    {
    	return $this->ConocimientosPreviosI;
    }

    /**
     * @param mixed $ConocimientosPreviosI
     *
     * @return self
     */
    public function setConocimientosPreviosI($ConocimientosPreviosI)
    {
    	$this->ConocimientosPreviosI = $ConocimientosPreviosI;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getBreveDescripcion()
    {
    	return $this->BreveDescripcion;
    }

    /**
     * @param mixed $BreveDescripcion
     *
     * @return self
     */
    public function setBreveDescripcion($BreveDescripcion)
    {
    	$this->BreveDescripcion = $BreveDescripcion;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getBreveDescripcionI()
    {
    	return $this->BreveDescripcionI;
    }

    /**
     * @param mixed $BreveDescripcionI
     *
     * @return self
     */
    public function setBreveDescripcionI($BreveDescripcionI)
    {
    	$this->BreveDescripcionI = $BreveDescripcionI;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getProgramaDetallado()
    {
    	return $this->ProgramaDetallado;
    }

    /**
     * @param mixed $ProgramaDetallado
     *
     * @return self
     */
    public function setProgramaDetallado($ProgramaDetallado)
    {
    	$this->ProgramaDetallado = $ProgramaDetallado;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getProgramaDetalladoI()
    {
    	return $this->ProgramaDetalladoI;
    }

    /**
     * @param mixed $ProgramaDetalladoI
     *
     * @return self
     */
    public function setProgramaDetalladoI($ProgramaDetalladoI)
    {
    	$this->ProgramaDetalladoI = $ProgramaDetalladoI;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getIdAsignatura()
    {
    	return $this->IdModAsignatura;
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
}