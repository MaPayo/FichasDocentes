<?php

namespace es\ucm;
include "Event.php";

class CommandUpdateteLaboratorio implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saLaboratorio = $factorySA->createSALaboratorio();
        $laboratorio = $saLaboratorio->updateLaboratorio($data);
        $responseContext = null;
        if($laboratorio){
            $responseContext = new Context(UPDATE_LABORATORIO_OK, $laboratorio); 
        }
        else{
            $responseContext = new Context(UPDATE_LABORATORIO_FAIL, null);
        }
        return $responseContext;
        
    }

}