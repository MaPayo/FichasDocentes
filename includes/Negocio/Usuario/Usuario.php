<?php

namespace es\ucm;

class Usuario{
    
	private $Email;
	private $Password;

	public function __construct($Email,$Password){
		$this->Email = $Email;
		$this->Password = $Password;
	}

    /**
     * @return mixed
     */
    public function getEmail()
    {
    	return $this->Email;
    }

    /**
     * @param mixed $Email
     *
     * @return self
     */
    public function setEmail($Email)
    {
    	$this->Email = $Email;

    	return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
    	return $this->Password;
    }

    /**
     * @param mixed $Password
     *
     * @return self
     */
    public function setPassword($Password)
    {
    	$this->Password = $Password;

    	return $this;
    }
}