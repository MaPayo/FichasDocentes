<?php

namespace es\ucm;
include "Event.php";

class CommandUpdateModProgramaAsignatura implements Command
{
    

    public function execute($data){
        $factorySA = new FactorySAImplements();
        $saPrograma = $factorySA->createSAModProgramaAsignatura();
        $programa = $saPrograma->updateModProgramaAsignatura($data);
        $responseContext = null;
        if($programa){
            $responseContext = new Context(UPDATE_MODPROGRAMA_ASIGNATURA_OK, $programa); 
        }
        else{
            $responseContext = new Context(UPDATE_MODPROGRAMA_ASIGNATURA_FAIL, null);
        }
        return $responseContext;
        
    }

}