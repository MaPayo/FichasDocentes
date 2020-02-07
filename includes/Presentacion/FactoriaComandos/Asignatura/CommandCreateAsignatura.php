<?php

namespace es\ucm;
include "Event.php";

class CommandCreateAsignatura implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saAsignatura = $factorySA->SAAsignatura();
        $asignatura = $saAsignatura->createAsignatura($data);
        $responseContext = null;
        if($asignatura !=null){
            $responseContext = new Context(CREATE_ASIGNATURA_OK, $asignatura); 
        }
        else{
            $responseContext = new Context(CREATE_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
        
    }

}