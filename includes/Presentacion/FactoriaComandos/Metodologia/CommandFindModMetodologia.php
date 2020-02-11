<?php

namespace es\ucm;
include "Event.php";

class CommandFindModMetodologia implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saMetodologia = $factorySA->createSAModMetodologia();
        $metodologia = $saMetodologia->findModMetodologia($data);
        $responseContext = null;
        if($metodologia){
            $responseContext = new Context(FIND_MODMETODOLOGIA_OK, $metodologia); 
        }
        else{
            $responseContext = new Context(FIND_MODMETODOLOGIA_FAIL, null);
        }
        return $responseContext;
        
    }

}