<?php
namespace es\ucm;

class Bibliografia{
	private $IdBibliografia;
	private $CitasBibliograficas;
	private $RecursosInternet;
	private $IdAsignatura;

	public function __construct($IdBibliografia,$CitasBibliograficas,$RecursosInternet,$IdAsignatura){
		$this->IdBibliografia = $IdBibliografia;
		$this->CitasBibliograficas = $CitasBibliograficas;
		$this->RecursosInternet = $RecursosInternet;
		$this->IdAsignatura = $IdAsignatura;
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