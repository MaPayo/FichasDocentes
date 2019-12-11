<?php
namespace es\ucm;

class Profesor{
	private $Email;
	private $Nombre;
	private $Departamento;
	private $Despacho;
	private $Tutoria;
	private $Facultad;
    private $IdGrupoLab;
    private $IdGrupoClase;

	public function __construct($Email,$Nombre,$Departamento,$Despacho,$Tutoria,$Facultad,$IdGrupoLab,$IdGrupoClase){
		$this->Email = $Email;
		$this->Nombre = $Nombre;
		$this->Departamento = $Departamento;
		$this->Despacho = $Despacho;
		$this->Tutoria = $Tutoria;
		$this->Facultad = $Facultad;
        $this->IdGrupoLab = $IdGrupoLab;
        $this->IdGrupoClase = $IdGrupoClase;
	}

    /**
     * @return mixed
     */
    public function getEmail()
    {
    	return $this->Email;
    }

    /**
     * @param mixed $Email
     *
     * @return self
     */
    public function setEmail($Email)
    {
    	$this->Email = $Email;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
    	return $this->Nombre;
    }

    /**
     * @param mixed $Nombre
     *
     * @return self
     */
    public function setNombre($Nombre)
    {
    	$this->Nombre = $Nombre;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getDepartamento()
    {
    	return $this->Departamento;
    }

    /**
     * @param mixed $Departamento
     *
     * @return self
     */
    public function setDepartamento($Departamento)
    {
    	$this->Departamento = $Departamento;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getDespacho()
    {
    	return $this->Despacho;
    }

    /**
     * @param mixed $Despacho
     *
     * @return self
     */
    public function setDespacho($Despacho)
    {
    	$this->Despacho = $Despacho;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getTutoria()
    {
    	return $this->Tutoria;
    }

    /**
     * @param mixed $Tutoria
     *
     * @return self
     */
    public function setTutoria($Tutoria)
    {
    	$this->Tutoria = $Tutoria;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getFacultad()
    {
    	return $this->Facultad;
    }

    /**
     * @param mixed $Facultad
     *
     * @return self
     */
    public function setFacultad($Facultad)
    {
    	$this->Facultad = $Facultad;

    	return $this;
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