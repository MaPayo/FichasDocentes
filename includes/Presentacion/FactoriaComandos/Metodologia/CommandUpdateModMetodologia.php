<?php

namespace es\ucm;
include "Event.php";

class CommandUpdateModMetodologia implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saMetodologia = $factorySA->createSAModMetodologia();
        $metodologia = $saMetodologia->updateModMetodologia($data);
        $responseContext = null;
        if($metodologia){
            $responseContext = new Context(UPDATE_MODMETODOLOGIA_OK, $metodologia); 
        }
        else{
            $responseContext = new Context(UPDATE_MODMETODOLOGIA_FAIL, null);
        }
        return $responseContext;
        
    }

}