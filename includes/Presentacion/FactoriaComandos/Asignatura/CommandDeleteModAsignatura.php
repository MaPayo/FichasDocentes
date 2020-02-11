<?php

namespace es\ucm;
include "Event.php";

class CommandDeleteModAsignatura implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saAsignatura = $factorySA->createSAModAsignatura();
        $delete = $saAsignatura->deleteModAsignatura($data);
        $responseContext = null;
        if($delete){
            $responseContext = new Context(DELETE_MODASIGNATURA_OK, null); 
        }
        else{
            $responseContext = new Context(DELETE_MODASIGNATURA_FAIL, null);
        }
        return $responseContext;
        
    }

}