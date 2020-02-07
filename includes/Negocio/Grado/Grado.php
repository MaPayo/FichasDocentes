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