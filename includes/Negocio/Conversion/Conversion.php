<?php
namespace es\ucm;

class Conversion {

    private $IdAsignatura;
    private $HTML;
    

    public function __construct($IdAsignatura,$HTML)
    {
        $this->IdAsignatura = $IdAsignatura;
        $this->HTML = $HTML;
    }

    public function getIDAsignatura(){
        return $this->IdAsignatura;
    }

    public function getHTML(){
        return $this->NombreAsignatura;
    }

    public function setIDAsignatura($IdAsignatura){
        $this->IdAsignatura=$IdAsignatura;
    }

    public function setHTML($NombreAsignatura){
        $this->NombreAsignatura=$NombreAsignatura;
    }

  
}

