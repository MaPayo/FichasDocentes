<?php

namespace es\ucm;
include "Event.php";

class CommandCreateProblema implements Command
{
    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saProblema = $factorySA->createSAProblema();
        $problema = $saProblema->createProblema($data);
        $responseContext = null;
        if($problema){
            $responseContext = new Context(CREATE_PROBLEMAS_OK, $problema); 
        }
        else{
            $responseContext = new Context(CREATE_PROBLEMAS_FAIL, null);
        }
        return $responseContext;
        
    }

}