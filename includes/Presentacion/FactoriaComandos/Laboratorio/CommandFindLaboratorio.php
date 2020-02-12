<?php

namespace es\ucm;
include "Event.php";

class CommandFindLaboratorio implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saLaboratorio = $factorySA->createSALaboratorio();
        $laboratorio = $saLaboratorio->findLaboratorio($data);
        $responseContext = null;
        if($laboratorio){
            $responseContext = new Context(FIND_LABORATORIO_OK, $laboratorio); 
        }
        else{
            $responseContext = new Context(FIND_LABORATORIO_FAIL, null);
        }
        return $responseContext;
        
    }

}