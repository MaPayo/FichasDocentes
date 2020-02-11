<?php

namespace es\ucm;
include "Event.php";

class CommandDeleteProfesor implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saProfesor = $factorySA->createSAProfesor();
        $profesor = $saProfesor->deleteProfesor($data);
        $responseContext = null;
        if($profesor){
            $responseContext = new Context(DELETE_PROFESOR_OK, $profesor); 
        }
        else{
            $responseContext = new Context(DELETE_PROFESOR_FAIL, null);
        }
        return $responseContext;
        
    }

}