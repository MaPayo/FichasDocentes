<?php
namespace es\ucm;

class ModAsignatura {
    
    private $IdModAsignatura;
    private $FechaMod;
    private $EmailMod;
    private $IdAsignatura;

    public function __construct($IdModAsignatura,$FechaMod,$EmailMod,$IdAsignatura){
        $this->IdModAsignatura = $IdModAsignatura;
        $this->FechaMod = $FechaMod;
        $this->EmailMod = $EmailMod;
        $this->IdAsignatura = $IdAsignatura;
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

    /**
     * @return mixed
     */
    public function getFechaMod()
    {
        return $this->FechaMod;
    }

    /**
     * @param mixed $FechaMod
     *
     * @return self
     */
    public function setFechaMod($FechaMod)
    {
        $this->FechaMod = $FechaMod;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailMod()
    {
        return $this->EmailMod;
    }

    /**
     * @param mixed $EmailMod
     *
     * @return self
     */
    public function setEmailMod($EmailMod)
    {
        $this->EmailMod = $EmailMod;

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