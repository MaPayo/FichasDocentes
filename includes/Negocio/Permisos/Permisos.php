<?php
namespace es\ucm;

class Permisos{
    
	private $IdPermiso;
	private $Permiso;
	private $IdAsignatura;
	private $EmailProfesor;

	public function __construct($IdPermiso,$Permiso,$IdAsignatura,$EmailProfesor){
		$this->IdPermiso = $IdPermiso;
		$this->Permiso = $Permiso;
		$this->IdAsignatura = $IdAsignatura;
		$this->EmailProfesor = $EmailProfesor;
	}

    /**
     * @return mixed
     */
    public function getIdPermiso()
    {
    	return $this->IdPermiso;
    }

    /**
     * @param mixed $IdPermiso
     *
     * @return self
     */
    public function setIdPermiso($IdPermiso)
    {
    	$this->IdPermiso = $IdPermiso;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getPermiso()
    {
    	return $this->Permiso;
    }

    /**
     * @param mixed $Permiso
     *
     * @return self
     */
    public function setPermiso($Permiso)
    {
    	$this->Permiso = $Permiso;

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

    /**
     * @return mixed
     */
    public function getEmailProfesor()
    {
    	return $this->EmailProfesor;
    }

    /**
     * @param mixed $EmailProfesor
     *
     * @return self
     */
    public function setEmailProfesor($EmailProfesor)
    {
    	$this->EmailProfesor = $EmailProfesor;

    	return $this;
    }
}