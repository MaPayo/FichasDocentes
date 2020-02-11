<?php

namespace es\ucm;
include "Event.php";

class CommandUpdateProfesor implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saProfesor = $factorySA->createSAProfesor();
        $profesor = $saProfesor->updateProfesor($data);
        $responseContext = null;
        if($profesor){
            $responseContext = new Context(UPDATE_PROFESOR_OK, $profesor); 
        }
        else{
            $responseContext = new Context(UPDATE_PROFESOR_FAIL, null);
        }
        return $responseContext;
        
    }

}