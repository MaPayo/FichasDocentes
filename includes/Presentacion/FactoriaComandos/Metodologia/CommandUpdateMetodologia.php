<?php

namespace es\ucm;
include "Event.php";

class CommandUpdateMetodologia implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saMetodologia = $factorySA->createSAMetodologia();
        $metodologia = $saMetodologia->updateMetodologia($data);
        $responseContext = null;
        if($metodologia){
            $responseContext = new Context(UPDATE_METODOLOGIA_OK, $metodologia); 
        }
        else{
            $responseContext = new Context(UPDATE_METODOLOGIA_FAIL, null);
        }
        return $responseContext;
        
    }

}