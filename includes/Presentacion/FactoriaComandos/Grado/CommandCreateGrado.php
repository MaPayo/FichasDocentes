<?php

namespace es\ucm;
include "Event.php";

class CommandCreateteGrado implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saGrado = $factorySA->createSAGrado();
        $grado = $saGrado->createGrado($data);
        $responseContext = null;
        if($grado){
            $responseContext = new Context(CREATE_GRADO_OK, $grado); 
        }
        else{
            $responseContext = new Context(CREATE_GRADO_FAIL, null);
        }
        return $responseContext;
        
    }

}