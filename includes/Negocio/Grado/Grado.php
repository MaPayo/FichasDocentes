<?php
namespace es\ucm;

<<<<<<< Updated upstream
class Grado{
	private $CodigoGrado;
	private $NombreGrado;
	private $HorasEcts;

	public function __construct($CodigoGrado,$NombreGrado,$HorasEcts){
		$this->CodigoGrado = $CodigoGrado;
		$this->NombreGrado = $NombreGrado;
		$this->HorasEcts = $HorasEcts;
=======
class Grado
{
    private $CodigoGrado;
    private $NombreGrado;
    private $CoordinadorGrado;
    private $HorasEcts;

    public function __construct($CodigoGrado, $NombreGrado, $CoordinadorGrado, $HorasEcts)
    {
        $this->CodigoGrado = $CodigoGrado;
        $this->NombreGrado = $NombreGrado;
        $this->CoordinadorGrado = $CoordinadorGrado;
        $this->HorasEcts = $HorasEcts;
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
    	$this->NombreGrado = $NombreGrado;
=======
        $this->NombreGrado = $NombreGrado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCoordinadorGrado()
    {
        return $this->CoordinadorGrado;
    }

    /**
     * @param mixed $CoordinadorGrado
     *
     * @return self
     */
    public function setCoordinadorGrado($CoordinadorGrado)
    {
        $this->CoordinadorGrado = $CoordinadorGrado;
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
    	$this->HorasEcts = $HorasEcts;

    	return $this;
    }
=======
        $this->HorasEcts = $HorasEcts;

        return $this;
    }

>>>>>>> Stashed changes

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