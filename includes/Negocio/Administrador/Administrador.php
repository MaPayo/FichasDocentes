<?php
namespace es\ucm;

class Administrador{
	private $email;
	private $Nombre;
	public function __construct($email, $Nombre){
		$this->email = $email;
		$this->Nombre = $Nombre;
	} 


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

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
}