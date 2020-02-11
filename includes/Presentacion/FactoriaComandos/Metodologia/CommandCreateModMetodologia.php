<?php

namespace es\ucm;
include "Event.php";

class CommandCreateModMetodologia implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saMetodologia = $factorySA->createSAModMetodologia();
        $metodologia = $saMetodologia->createModMetodologia($data);
        $responseContext = null;
        if($metodologia){
            $responseContext = new Context(CREATE_MODMETODOLOGIA_OK, $metodologia); 
        }
        else{
            $responseContext = new Context(CREATE_MODMETODOLOGIA_FAIL, null);
        }
        return $responseContext;
        
    }

}