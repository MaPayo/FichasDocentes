<?php

namespace es\ucm;
include "Event.php";

class CommandDeleteModProgramaAsignatura implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saPrograma = $factorySA->createSAModProgramaAsignatura();
        $programa = $saPrograma->deleteModProgramaAsignatura($data);
        $responseContext = null;
        if($programa){
            $responseContext = new Context(DELETE_MODPROGRAMA_ASIGNATURA_OK, $programa); 
        }
        else{
            $responseContext = new Context(DELETE_MODPROGRAMA_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
        
    }

}