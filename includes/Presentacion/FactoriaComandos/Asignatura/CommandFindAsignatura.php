<?php

namespace es\ucm;
include "Event.php";

class CommandFindAsignatura implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saAsignatura = $factorySA->createSAAsignatura();
        $asignatura = $saAsignatura->findAsignatura($data);
        $responseContext = null;
        if($asignatura !=null){
            $responseContext = new Context(FIND_ASIGNATURA_OK, $asignatura); 
        }
        else{
            $responseContext = new Context(FIND_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
        
    }

}