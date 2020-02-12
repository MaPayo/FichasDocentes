<?php

namespace es\ucm;
include "Event.php";

class CommandDeleteLaboratorio implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saLaboratorio = $factorySA->createSALaboratorio();
        $laboratorio = $saLaboratorio->deleteLaboratorio($data);
        $responseContext = null;
        if($laboratorio){
            $responseContext = new Context(DELETE_LABORATORIO_OK, $laboratorio); 
        }
        else{
            $responseContext = new Context(DELETE_LABORATORIO_FAIL, null);
        }
        return $responseContext;
        
    }

}