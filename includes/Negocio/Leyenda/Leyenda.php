<?php
namespace es\ucm;

class Leyenda{
	private $IdLeyenda;
	private $Lectura;
	private $Escritura;
	private $Confirm;
	private $EditPerm;

	public function __construct($IdLeyenda,$Lectura,$Escritura,$Confirm,$EditPerm){
		$this->IdLeyenda = $IdLeyenda;
		$this->Lectura = $Lectura;
		$this->Escritura = $Escritura;
		$this->Confirm = $Confirm;
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
    public function getConfirm()
    {
    	return $this->Confirm;
    }

    /**
     * @param mixed $Confirm
     *
     * @return self
     */
    public function setConfirm($Confirm)
    {
    	$this->Confirm = $Confirm;

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