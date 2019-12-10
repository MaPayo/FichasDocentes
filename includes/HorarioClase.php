<?php
namespace es\ucm;

class HorarioClase{
	private $IdHorarioClase;
	private $Aula;
	private $Dia;
	private $HoraInicio;
	private $HoraFin;
	private $IdGrupoClase;
    
	public function __construct($IdHorarioClase,$Aula,$Dia,$HoraInicio,$HoraFin,$IdGrupoClase,){
		$this->IdHorarioClase = $IdHorarioClase;
		$this->Aula = $Aula;
		$this->Dia = $Dia;
		$this->HoraInicio = $HoraInicio;
		$this->HoraFin = $HoraFin;
		$this->IdGrupoClase = $IdGrupoClase;
	}

    /**
     * @return mixed
     */
    public function getIdHorarioClase()
    {
    	return $this->IdHorarioClase;
    }

    /**
     * @param mixed $IdHorarioClase
     *
     * @return self
     */
    public function setIdHorarioClase($IdHorarioClase)
    {
    	$this->IdHorarioClase = $IdHorarioClase;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getAula()
    {
    	return $this->Aula;
    }

    /**
     * @param mixed $Aula
     *
     * @return self
     */
    public function setAula($Aula)
    {
    	$this->Aula = $Aula;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getDia()
    {
    	return $this->Dia;
    }

    /**
     * @param mixed $Dia
     *
     * @return self
     */
    public function setDia($Dia)
    {
    	$this->Dia = $Dia;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getHoraInicio()
    {
    	return $this->HoraInicio;
    }

    /**
     * @param mixed $HoraInicio
     *
     * @return self
     */
    public function setHoraInicio($HoraInicio)
    {
    	$this->HoraInicio = $HoraInicio;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getHoraFin()
    {
    	return $this->HoraFin;
    }

    /**
     * @param mixed $HoraFin
     *
     * @return self
     */
    public function setHoraFin($HoraFin)
    {
    	$this->HoraFin = $HoraFin;

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
}