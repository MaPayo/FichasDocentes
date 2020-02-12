<?php

namespace es\ucm;
include "Event.php";

class CommandCreateLaboratorio implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saLaboratorio = $factorySA->createSALaboratorio();
        $laboratorio = $saLaboratorio->createLaboratorio($data);
        $responseContext = null;
        if($laboratorio){
            $responseContext = new Context(CREATE_LABORATORIO_OK, $laboratorio); 
        }
        else{
            $responseContext = new Context(CREATE_LABORATORIO_FAIL, null);
        }
        return $responseContext;
        
    }

}