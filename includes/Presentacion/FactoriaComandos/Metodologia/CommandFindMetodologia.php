<?php

namespace es\ucm;
include "Event.php";

class CommandFindMetodologia implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saMetodologia = $factorySA->createSAMetodologia();
        $metodologia = $saMetodologia->findMetodologia($data);
        $responseContext = null;
        if($metodologia){
            $responseContext = new Context(FIND_METODOLOGIA_OK, $metodologia); 
        }
        else{
            $responseContext = new Context(FIND_METODOLOGIA_FAIL, null);
        }
        return $responseContext;
        
    }

}