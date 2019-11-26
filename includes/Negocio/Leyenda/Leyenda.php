<?php
namespace es\ucm;

class Leyenda{
    
	private $IdLeyenda;
	private $Lectura;
	private $Escritura;
	private $Check;
	private $EditPerm;

	public function __construct($IdLeyenda,$Lectura,$Escritura,$Check,$EditPerm){
		$this->IdLeyenda = $IdLeyenda;
		$this->Lectura = $Lectura;
		$this->Escritura = $Escritura;
		$this->Check = $Check;
		$this->EditPerm = $EditPerm;
	}

    /**
     * @return mixed
     */
    public function getIdLeyenda()
    {
    	return $this->IdLeyenda;
    }

    /**
     * @param mixed $IdLeyenda
     *
     * @return self
     */
    public function setIdLeyenda($IdLeyenda)
    {
    	$this->IdLeyenda = $IdLeyenda;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getLectura()
    {
    	return $this->Lectura;
    }

    /**
     * @param mixed $Lectura
     *
     * @return self
     */
    public function setLectura($Lectura)
    {
    	$this->Lectura = $Lectura;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getEscritura()
    {
    	return $this->Escritura;
    }

    /**
     * @param mixed $Escritura
     *
     * @return self
     */
    public function setEscritura($Escritura)
    {
    	$this->Escritura = $Escritura;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getCheck()
    {
    	return $this->Check;
    }

    /**
     * @param mixed $Check
     *
     * @return self
     */
    public function setCheck($Check)
    {
    	$this->Check = $Check;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getEditPerm()
    {
    	return $this->EditPerm;
    }

    /**
     * @param mixed $EditPerm
     *
     * @return self
     */
    public function setEditPerm($EditPerm)
    {
    	$this->EditPerm = $EditPerm;

    	return $this;
    }
}