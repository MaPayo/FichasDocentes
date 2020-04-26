<?php
namespace es\ucm;

class Grado{
	private $CodigoGrado;
	private $NombreGrado;
	private $HorasEcts;

	public function __construct($CodigoGrado,$NombreGrado,$HorasEcts){
		$this->CodigoGrado = $CodigoGrado;
		$this->NombreGrado = $NombreGrado;
		$this->HorasEcts = $HorasEcts;
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
    public function getHorasEcts()
    {
    	return $this->HorasEcts;
    }

    /**
     * @param mixed $HorasEtcs
     *
     * @return self
     */
    public function setHorasEcts($HorasEcts)
    {
    	$this->HorasEcts = $HorasEcts;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getCodigoGrado()
    {
        return $this->CodigoGrado;
    }

    /**
     * @param mixed $CodigoGrado
     *
     * @return self
     */
    public function setCodigoGrado($CodigoGrado)
    {
        $this->CodigoGrado = $CodigoGrado;

        return $this;
    }
}