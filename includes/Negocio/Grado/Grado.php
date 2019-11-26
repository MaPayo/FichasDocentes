<?php
namespace es\ucm;

class Grado{
    
	private $CodigoGrado;
	private $NombreGrado;
	private $HorasEtcs;

	public function __construct($CodigoGrado,$NombreGrado,$HorasEtcs){
		$this->CodigoGrado = $CodigoGrado;
		$this->NombreGrado = $NombreGrado;
		$this->HorasEtcs = $HorasEtcs;
		$this->CodigoGrado = $CodigoGrado;
	}

    /**
     * @return mixed
     */
    public function getNombreGrado()
    {
    	return $this->NombreGrado;
    }

    /**
     * @param mixed $NombreGrado
     *
     * @return self
     */
    public function setNombreGrado($NombreGrado)
    {
    	$this->NombreGrado = $NombreGrado;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getHorasEtcs()
    {
    	return $this->HorasEtcs;
    }

    /**
     * @param mixed $HorasEtcs
     *
     * @return self
     */
    public function setHorasEtcs($HorasEtcs)
    {
    	$this->HorasEtcs = $HorasEtcs;

    	return $this;
    }
}