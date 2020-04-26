<?php
namespace es\ucm;

class ModBibliografia{
	private $IdBibliografia;
	private $CitasBibliograficas;
	private $RecursosInternet;
	private $IdModAsignatura;

	public function __construct($IdBibliografia,$CitasBibliograficas,$RecursosInternet,$IdModAsignatura){
		$this->IdBibliografia = $IdBibliografia;
		$this->CitasBibliograficas = $CitasBibliograficas;
		$this->RecursosInternet = $RecursosInternet;
		$this->IdModAsignatura = $IdModAsignatura;
	}

    /**
     * @return mixed
     */
    public function getIdBibliografia()
    {
    	return $this->IdBibliografia;
    }

    /**
     * @param mixed $IdBibliografia
     *
     * @return self
     */
    public function setIdBibliografia($IdBibliografia)
    {
    	$this->IdBibliografia = $IdBibliografia;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getCitasBibliograficas()
    {
    	return $this->CitasBibliograficas;
    }

    /**
     * @param mixed $CitasBibliograficas
     *
     * @return self
     */
    public function setCitasBibliograficas($CitasBibliograficas)
    {
    	$this->CitasBibliograficas = $CitasBibliograficas;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getRecursosInternet()
    {
    	return $this->RecursosInternet;
    }

    /**
     * @param mixed $RecursosInternet
     *
     * @return self
     */
    public function setRecursosInternet($RecursosInternet)
    {
    	$this->RecursosInternet = $RecursosInternet;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getIdModAsignatura()
    {
    	return $this->IdModAsignatura;
    }

    /**
     * @param mixed $IdModAsignatura
     *
     * @return self
     */
    public function setIdModAsignatura($IdModAsignatura)
    {
    	$this->IdModAsignatura = $IdModAsignatura;

    	return $this;
    }
}